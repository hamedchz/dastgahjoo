<?php

namespace App\Http\Livewire\Admin\Messages\Products;

use App\Models\Inquiries;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class ProductMessageLists extends Component
{
    use WithPagination,AuthorizesRequests;

    Protected $paginationTheme = 'bootstrap';
    public $status;
    public $inquiry;
    public $states;
    public $answer = null;
    public $removeId = null;

  
    public function resetInputAnswer(){
        $this->answer = "";
    }
    public function filterMessagesByStatus($status = null){
        $this->resetPage();
        $this->status = $status;
    }
    public function changeStatus(Inquiries $inq, $status){
        $update = $inq->update([
            'status' => $status
        ]);
        if ($update) {
         
            $this->dispatchBrowserEvent('editproductStatus',['message' => 'وضعیت با موفقیت ویرایش شد', 'action' => 'success']);
            (new \App\Models\Log)->storeLog($inq->title,' ویرایش  سوال محصول ','ویرایش ');

        }else{
          
            $this->dispatchBrowserEvent('editproductStatus',['message' => 'مشکلی وجود دارد', 'action' => 'error']);
            (new \App\Models\Log)->storeLog($inq->title,' خطا در  ویرایش سوال محصول','ویرایش');

        }
    }
    public function getMessagesProperty(){
        return Inquiries::with('user')->with('products')->where('parent',0)->when($this->status,function($query,$status){
            return $query->where('status',$status);
        })->latest()->get();
    }

    public function edit($id){
        $comment = Inquiries::findOrFail($id);
        $this->states = $comment->comment;
        $this->inquiry = $comment;
        $this->dispatchBrowserEvent('show-editproductMessage');
    }
    public function update(){
        
        $validatedData = Validator::make(
        [
            'answer'=> $this->answer
        ],
        [ 'answer' => 'required'],
        [
          'required' => 'این فیلد نمیتواند خالی باشد'
        ])->validate();
        $answer = DB::table('inquiries')->insert([
            'title' => $this->inquiry->title,
            'product_id' => $this->inquiry->product_id,
            'vendor_id' => $this->inquiry->vendor_id,
            'comment' => $validatedData['answer'],
            'price' => $this->inquiry->price,
            'status' => 'CLOSED',
            'user_id' => $this->inquiry->user_id,
            'parent' => $this->inquiry->id,
            'created_at' => Carbon::now()]);
      
        $update = $this->inquiry->update([
            'status' => 'CLOSED',
        ]);
        if ($answer && $update) {
            $this->resetInputAnswer();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-editproductMessage',['message' => 'جواب با موفقیت فرستاده شد', 'action' => 'success']);
            (new \App\Models\Log)->storeLog($this->inquiry->title,' جواب به سوال محصول ','ویرایش ');

        }else{
            $this->resetInputAnswer();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-editproductMessage',['message' => 'مشکلی وجود دارد', 'action' => 'error']);
            (new \App\Models\Log)->storeLog($this->inquiry->title,' خطا در  جواب سوال محصول','ویرایش');

        }

    }
    public function removeConfirmation($id){
        $this->removeId = $id;
        $this->dispatchBrowserEvent('show-deleteProductMsg');
    }
    public function removeProductMsg(){
        $inq = Inquiries::findOrFail($this->removeId);
        $delete = $inq->delete();
        if ($delete) {
            $this->dispatchBrowserEvent('hide-removeProductMessage',['message' => 'پیام با موفقیت حذف شد', 'action' => 'success']);
            (new \App\Models\Log)->storeLog($this->removeId,' حذف  سوال محصول ','حذف ');

        }else{
            $this->dispatchBrowserEvent('hide-removeProductMessage',['message' => 'مشکلی وجود دارد', 'action' => 'error']);
            (new \App\Models\Log)->storeLog($this->removeId,' خطا در  حذف سوال محصول','حذف');

        }


    }
    public function render()
    {
        $this->authorize('inquiries',Inquiries::class);
        $messages = $this->messages;
        $numberAllMessages = Inquiries::where('parent',0)->count();
        $numberReadMessages = Inquiries::where('parent',0)->where('status','OPEN')->count();
        $numberunReadMessages = Inquiries::where('parent',0)->where('status','CLOSED')->count();
        return view('livewire.admin.messages.products.product-message-lists',[
            'messages' => $messages ,
            'numberReadMessages' => $numberReadMessages , 
            'numberunReadMessages' => $numberunReadMessages ,
            'numberAllMessages' => $numberAllMessages
             ])->layout('layouts.admin.app');
    }
}

<?php

namespace App\Http\Livewire\Admin\Faq;

use App\Models\Faq;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class FaqList extends Component
{
    use AuthorizesRequests,WithPagination;
    public $state=[];
    public $editStatus = false;
    public $province,$faq;
    public $removeId = null;

    protected function resetInputForm(){
        $this->state['body'] = "";
        $this->state['answer'] = "";
    }
    public function addNew(){
        $this->reset();
        $this->editStatus = false;
        $this->dispatchBrowserEvent('show-addProvince');
    }

    public function store(){
        $validatedData = Validator::make($this->state,[
            'body' => 'required',
            'answer' => 'required',
        ],[
            'body.required' => 'این فیلد نمیتواند خالی باشد',
            'answer.required' => 'این فیلد نمیتواند خالی باشد'

        ])->validate();
        $validatedData['user_id'] = auth()->user()->id;
       $save =  Faq::create($validatedData);
       if($save){
        $this->resetInputForm();
        $this->resetValidation();
        $this->dispatchBrowserEvent('hide-addProvince', ['message' => 'سوال جدید با موفقیت اضافه شد','action'=>'success']);
        (new \App\Models\Log)->storeLog($this->state['body'],'اضافه کردن سوال','ایجاد');
       }else{
        $this->resetInputForm();
        $this->resetValidation();
        $this->dispatchBrowserEvent('hide-addProvince', ['message' => 'مشکلی وجود دارد','action'=>'error']);
        (new \App\Models\Log)->storeLog($this->state['body'],'خطا در اضافه کردن سوال','ایجاد');
       }
    }
    public function edit(Faq $faq){
        $this->editStatus = true;
        $this->faq = $faq;
        $this->state = $faq->toArray();
        $this->dispatchBrowserEvent('show-addProvince');
    }
    public function update(){
        $validatedData = Validator::make($this->state,[
            'body' => 'required',
            'answer' => 'required',
        ],[
            'body.required' => 'این فیلد نمیتواند خالی باشد',
            'answer.required' => 'این فیلد نمیتواند خالی باشد'

        ])->validate();
        $update = $this->faq->update([ 
            'body' => $validatedData['body'],
            'answer' => $validatedData['answer'],
        ]);
        if($update){
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-addProvince', ['message' => 'سوال  با موفقیت ویرایش شد','action'=>'success']);
            (new \App\Models\Log)->storeLog($this->state['body'],'ویرایش کردن سوال','ویرایش');
           }else{
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-addProvince', ['message' => 'مشکلی وجود دارد','action'=>'error']);
            (new \App\Models\Log)->storeLog($this->state['body'],'خطا در ویرایش کردن سوال','ویرایش');
           }
    }
 
    public function removeConfirmation($id){
        $this->removeId = $id;
        $this->dispatchBrowserEvent('show-provinceDelete');
    }
    public function remove(){
        $prov = Faq::findOrFail($this->removeId);
        $delete = $prov->update([
            'isActive' => 0,
        ]);
        if($delete){
            $this->dispatchBrowserEvent('hide-deleteProvince', ['message' => 'سوال  با موفقیت حذف شد','action'=>'success']);
            (new \App\Models\Log)->storeLog( $prov->title,'حذف کردن سوال','حذف');
           }else{
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-addCity', ['message' => 'مشکلی وجود دارد','action'=>'error']);
            (new \App\Models\Log)->storeLog( $prov->title,'خطا در حذف کردن سوال','حذف');
           }

    }
    public function render()
    {
        $this->authorize('faq',Faq::class);
        $faqLists =Faq::where('isActive',1)->orderBy('id','desc')->paginate(21);
        return view('livewire.admin.faq.faq-list',['faqLists'=> $faqLists])->layout('layouts.admin.app');
    }
}

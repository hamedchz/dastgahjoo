<?php

namespace App\Http\Livewire\Admin\Seller\Message\Products;

use App\Models\Inquiries;
use Livewire\Component;
use Livewire\WithPagination;

class ProductVendorMessageRecieve extends Component
{

    use WithPagination;

    public $paginationTheme = 'bootstrap';

    public $message =null;

    public function showMessage($id){
        $inquiries = Inquiries::whereId($id)->first();
        $this->message = $inquiries;
        $this->dispatchBrowserEvent('show-message');
    }
    public function changeStatus(Inquiries $inq, $status){
        $update = $inq->update([
            'status' => $status
        ]);
        if ($update) {
         
            $this->dispatchBrowserEvent('editproductStatus',['message' => 'وضعیت با موفقیت ویرایش شد', 'action' => 'success']);
            (new \App\Models\Log)->storeLog($inq->title,' ویرایش   پیام محصول ','ویرایش');

        }else{
            
            $this->dispatchBrowserEvent('editproductStatus',['message' => 'مشکلی وجود دارد', 'action' => 'error']);
            (new \App\Models\Log)->storeLog($inq->title,' خطا در  ویرایش  پیام محصول','ویرایش');

        }
    }
    public function render()
    {
    
        $messages = Inquiries::where('parent',0)->where('sender_id',auth()->user()->id)->get();
        return view('livewire.admin.seller.message.products.product-vendor-message-recieve',['messages'=>$messages])->layout('layouts.admin.app');
    }
}

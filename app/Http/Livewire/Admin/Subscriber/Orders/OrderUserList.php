<?php

namespace App\Http\Livewire\Admin\Subscriber\Orders;

use App\Models\Inquiries;
use Livewire\Component;
use Livewire\WithPagination;

class OrderUserList extends Component
{
    use WithPagination;
    public $message = null;
    
      public function showMessage($id){
        $inquiries = Inquiries::whereId($id)->first();
        $this->message = $inquiries;
        $this->dispatchBrowserEvent('show-message');
    }
    public function render()
    {
        $messages = Inquiries::where('parent',0)->where('sender_id',auth()->user()->id)->latest()->get();
        return view('livewire.admin.subscriber.orders.order-user-list',['messages'=>$messages])->layout('layouts.admin.app');
    }
}

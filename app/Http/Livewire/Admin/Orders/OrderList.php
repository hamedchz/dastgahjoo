<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class OrderList extends Component
{
    use AuthorizesRequests;

    public $removeId;

    public function changeDeliveryStatus(Order $order,$status){
        
        $update = $order->update([
            'delivery' => $status
        ]);

        if($update){
            $this->dispatchBrowserEvent('hideDeliveryStatus',['message' => 'سفارش با موفقیت ویرایش شد','action' => 'success']);
            (new \App\Models\Log)->storeLog($order->id,'ویرایش کردن سفارش','ویرایش ');
        }else{
            $this->dispatchBrowserEvent('hideDeliveryStatus',['message' => 'مشکلی وجود دارد' , 'action' => 'reject']);
            (new \App\Models\Log)->storeLog($order->id,'خطا در ویرایش کردن سفارش','ویرایش ');
        }
    }

    public function removeConfirmation($id){
        $this->removeId = $id;
        $this->dispatchBrowserEvent('showOrderDelete');
    }
    public function removeOrder(){
        $order = Order::findOrFail($this->removeId);
        $delete = $order->update([
            'isActive' => 0,
        ]);
        if($delete){
            $this->dispatchBrowserEvent('hideorderDelete',['message' => 'سفارش با موفقیت حذف شد','action' => 'success']);
            (new \App\Models\Log)->storeLog($order->title,'حذف کردن سفارش','حذف ');
        }else{
            $this->dispatchBrowserEvent('hideorderDelete',['message' => 'مشکلی وجود دارد' , 'action' => 'reject']);
            (new \App\Models\Log)->storeLog($order->title,'خطا در حذف کردن سفارش','حذف ');
        }

    }
    public function render()
    {
        $this->authorize('orders');
        $orders  = Order::where('isActive',1)->get();
        return view('livewire.admin.orders.order-list',['orders'=> $orders])->layout('layouts.admin.app');
    }
}

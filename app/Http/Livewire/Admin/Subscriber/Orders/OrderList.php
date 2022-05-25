<?php

namespace App\Http\Livewire\Admin\Subscriber\Orders;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrderList extends Component
{
    use WithPagination;

    public function render()
    {
        $orders = Order::where('user_id',auth()->user()->id)->latest()->paginate(21);
        return view('livewire.admin.subscriber.orders.order-list',['orders'=>$orders]);
    }
}

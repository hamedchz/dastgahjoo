<?php

namespace App\Http\Livewire\Admin\Seller\Orders;

use App\Models\Order;
use App\Models\Packages;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class OrderListVendor extends Component
{

    use WithPagination;

    public function render()
    {
   
      $orders  =  Order::whereHasMorph(
            'orderable',
            [Packages::class],
            function ($query) {
                $query->where('user_id',auth()->user()->id);
                }
        )->where('isActive',1)->get();
        return view('livewire.admin.seller.orders.order-list-vendor',['orders'=>$orders])->layout('layouts.admin.app');
    }
}

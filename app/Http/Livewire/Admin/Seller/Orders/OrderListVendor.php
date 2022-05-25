<?php

namespace App\Http\Livewire\Admin\Seller\Orders;

use App\Models\Order;
use App\Models\Product;
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
            [Product::class],
            function ($query) {
                $query->where('vendor_id',auth()->user()->vendor->id);
                }
        )->latest()->paginate(21);
        return view('livewire.admin.seller.orders.order-list-vendor',['orders'=>$orders])->layout('layouts.admin.app');
    }
}

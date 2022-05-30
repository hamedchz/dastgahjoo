<?php

namespace App\Http\Livewire\Admin\Seller\Package;

use App\Models\Packages;
use Livewire\Component;

class OrderPakage extends Component
{
    public function render()
    {
        $packages = Packages::with('discount')->where('isActive',1)->latest()->get();
        return view('livewire.admin.seller.package.order-pakage',['packages'=>$packages])->layout('layouts.users.app');
    }
}

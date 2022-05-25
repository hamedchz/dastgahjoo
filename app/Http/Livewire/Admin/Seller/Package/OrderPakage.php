<?php

namespace App\Http\Livewire\Admin\Seller\Package;

use App\Models\Packages;
use Livewire\Component;

class OrderPakage extends Component
{
    public function render()
    {
        $package = Packages::findOrFail(1);
        return view('livewire.admin.seller.package.order-pakage',['package'=>$package])->layout('layouts.users.app');
    }
}

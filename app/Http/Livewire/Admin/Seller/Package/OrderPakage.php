<?php

namespace App\Http\Livewire\Admin\Seller\Package;

use App\Models\MembershipBody;
use App\Models\Packages;
use Livewire\Component;

class OrderPakage extends Component
{
    public function render()
    {
        $packages = Packages::with('discount')->where('isActive',1)->latest()->get();
        $membershipBody = MembershipBody::first();
        return view('livewire.admin.seller.package.order-pakage',['membershipBody'=>$membershipBody,'packages'=>$packages])->layout('layouts.users.app');
    }
}

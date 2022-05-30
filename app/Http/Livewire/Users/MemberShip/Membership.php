<?php

namespace App\Http\Livewire\Users\MemberShip;

use App\Models\Packages;
use Livewire\Component;

class Membership extends Component
{
    public function render()
    {
        $packages = Packages::with('discount')->where('isActive',1)->latest()->get();
        return view('livewire.users.member-ship.membership',['packages' => $packages])->layout('layouts.users.app');
    }
}

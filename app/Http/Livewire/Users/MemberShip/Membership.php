<?php

namespace App\Http\Livewire\Users\MemberShip;

use Livewire\Component;

class Membership extends Component
{
    public function render()
    {
        return view('livewire.users.member-ship.membership')->layout('layouts.users.app');
    }
}

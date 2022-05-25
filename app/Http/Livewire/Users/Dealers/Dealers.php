<?php

namespace App\Http\Livewire\Users\Dearlers;

use App\Models\Category;
use App\Models\Vendors;
use Livewire\Component;

class Dealers extends Component
{
    public function render()
    {
        $dealers = Vendors::where('isApproved',2)->get();
        return view('livewire.users.dearlers.dealers',['dealers'=>$dealers])->layout('layouts.users.app');
    }
}

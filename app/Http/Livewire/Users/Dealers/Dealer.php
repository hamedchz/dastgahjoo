<?php

namespace App\Http\Livewire\Users\Dealers;

use App\Models\Vendors;
use Livewire\Component;

class Dealer extends Component
{
    public function render()
    {
        $dealers = Vendors::where('isApproved',2)->get();
        return view('livewire.users.dealers.dealer',['dealers'=>$dealers])->layout('layouts.users.app');
    }
}

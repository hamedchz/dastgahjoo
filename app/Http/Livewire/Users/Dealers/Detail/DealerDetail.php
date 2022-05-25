<?php

namespace App\Http\Livewire\Users\Dealers\Detail;

use App\Models\Vendors;
use Livewire\Component;

class DealerDetail extends Component
{

    public $vendor;

    public function mount($slug){
        $dealer = Vendors::where('slug',$slug)->first();
        $this->vendor = $dealer;
    }

    public function render()
    {
        return view('livewire.users.dealers.detail.dealer-detail')->layout('layouts.users.app');
    }
}

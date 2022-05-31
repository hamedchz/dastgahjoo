<?php

namespace App\Http\Livewire\Users\Dealers;

use App\Models\Vendors;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
class Dealer extends Component
{

    use SEOToolsTrait;

    public function render()
    {
        $this->seo()
        ->setTitle('قروشندگان ',false)
        ->setDescription('قروشندگان');
        $dealers = Vendors::where('isApproved',2)->get();
        return view('livewire.users.dealers.dealer',['dealers'=>$dealers])->layout('layouts.users.app');
    }
}

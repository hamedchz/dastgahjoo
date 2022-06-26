<?php

namespace App\Http\Livewire\Users\Dealers;

use App\Models\Advertises;
use App\Models\Vendors;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Carbon\Carbon;

class Dealer extends Component
{

    use SEOToolsTrait;

    public function render()
    {
        $this->seo()
        ->setTitle('قروشندگان ',false)
        ->setDescription('قروشندگان');
        $dealers = Vendors::where('isApproved',2)->get();
        $advertises = Advertises::where('expire_at','>=',Carbon::now())->inRandomOrder()->limit(5)->get();
        return view('livewire.users.dealers.dealer',['advertises'=>$advertises,'dealers'=>$dealers])->layout('layouts.users.app');
    }
}

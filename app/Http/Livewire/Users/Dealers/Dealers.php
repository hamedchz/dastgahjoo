<?php

namespace App\Http\Livewire\Users\Dearlers;

use App\Models\Advertises;
use App\Models\Category;
use App\Models\Vendors;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Carbon\Carbon;

class Dealers extends Component
{
    use SEOToolsTrait;

    public function render()
    {
        $dealers = Vendors::where('isApproved',2)->get();
        $this->seo()
        ->setTitle('قروشندگان ',false)
        ->setDescription('قروشندگان');
        $advertises = Advertises::where('expire_at','>=',Carbon::now())->inRandomOrder()->limit(5)->get();
        return view('livewire.users.dearlers.dealers',['advertises'=>$advertises,'dealers'=>$dealers])->layout('layouts.users.app');
    }
}

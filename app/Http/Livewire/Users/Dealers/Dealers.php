<?php

namespace App\Http\Livewire\Users\Dearlers;

use App\Models\Category;
use App\Models\Vendors;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
class Dealers extends Component
{
    use SEOToolsTrait;

    public function render()
    {
        $dealers = Vendors::where('isApproved',2)->get();
        $this->seo()
        ->setTitle('قروشندگان ',false)
        ->setDescription('قروشندگان');
        return view('livewire.users.dearlers.dealers',['dealers'=>$dealers])->layout('layouts.users.app');
    }
}

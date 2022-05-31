<?php

namespace App\Http\Livewire\Users\MemberShip;

use App\Models\Packages;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class Membership extends Component
{

    use SEOToolsTrait;

    public function render()
    {
        $this->seo()
        ->setTitle('عضویت ',false)
        ->setDescription('عضویت');
        $packages = Packages::with('discount')->where('isActive',1)->latest()->get();
        return view('livewire.users.member-ship.membership',['packages' => $packages])->layout('layouts.users.app');
    }
}

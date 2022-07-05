<?php

namespace App\Http\Livewire\Users\MemberShip;

use App\Models\MembershipBody;
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
        $membershipBody = MembershipBody::first();
        return view('livewire.users.member-ship.membership',['membershipBody'=>$membershipBody,'packages' => $packages])->layout('layouts.users.app');
    }
}

<?php

namespace App\Http\Livewire\Users\Policy;

use App\Models\Policy as ModelsPolicy;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class Policy extends Component
{
    use SEOToolsTrait;

    public function render()
    {
        $this->seo()
        ->setTitle('قوانین و مقررات سایت',false)
        ->setDescription('قوانین و مقررات سایت');
        $policy = ModelsPolicy::first();
        return view('livewire.users.policy.policy',['policy'=>$policy])->layout('layouts.users.app');
    }
}

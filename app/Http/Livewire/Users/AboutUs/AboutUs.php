<?php

namespace App\Http\Livewire\Users\AboutUs;

use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;


class AboutUs extends Component
{
    use SEOToolsTrait;
    
    public function render()
    {
        $this->seo()
        ->setTitle('درباره دستگاه جو ',false)
        ->setDescription('درباره دستگاه جو ');
        return view('livewire.users.about-us.about-us')->layout('layouts.users.app');
    }
}

<?php

namespace App\Http\Livewire\Users\AboutUs;

use App\Models\Aboutus as ModelsAboutus;
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
        $about = ModelsAboutus::where('id',1)->first();
        return view('livewire.users.about-us.about-us',['about'=>$about])->layout('layouts.users.app');
    }
}

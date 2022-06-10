<?php

namespace App\Http\Livewire\Users\Faq;

use App\Models\Faq as ModelsFaq;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class Faq extends Component
{
    use SEOToolsTrait;

    public function render()
    {
        $this->seo()
        ->setTitle('پرسشهای متداول ',false)
        ->setDescription('پرسشهای متداول');
        $faqs = ModelsFaq::where('isActive',1)->orderBy('id','desc')->get();
        return view('livewire.users.faq.faq',['faqs'=>$faqs])->layout('layouts.users.app');
    }
}

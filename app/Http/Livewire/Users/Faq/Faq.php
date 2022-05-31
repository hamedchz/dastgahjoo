<?php

namespace App\Http\Livewire\Users\Faq;

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
        return view('livewire.users.faq.faq')->layout('layouts.users.app');
    }
}

<?php

namespace App\Http\Livewire\Users\Faq;

use Livewire\Component;

class Faq extends Component
{
    public function render()
    {
        return view('livewire.users.faq.faq')->layout('layouts.users.app');
    }
}

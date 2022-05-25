<?php

namespace App\Http\Livewire\Users\ContactUs;

use Livewire\Component;

class Contact extends Component
{
    public function render()
    {
        return view('livewire.users.contact-us.contact')->layout('layouts.users.app');
    }
}

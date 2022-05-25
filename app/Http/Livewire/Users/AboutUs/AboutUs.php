<?php

namespace App\Http\Livewire\Users\AboutUs;

use Livewire\Component;

class AboutUs extends Component
{
    public function render()
    {
        return view('livewire.users.about-us.about-us')->layout('layouts.users.app');
    }
}

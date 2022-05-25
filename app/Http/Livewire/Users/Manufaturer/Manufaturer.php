<?php

namespace App\Http\Livewire\Users\Manufaturer;

use App\Models\Category;
use Livewire\Component;

class Manufaturer extends Component
{
    public function render()
    {
        $categories = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->get();
        return view('livewire.users.manufaturer.manufaturer',['categories'=>$categories])->layout('layouts.users.app');
    }
}

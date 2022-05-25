<?php

namespace App\Http\Livewire\Users\Sitmap;

use App\Models\Category;
use Livewire\Component;

class Sitemap extends Component
{
    public function render()
    {
        $categories = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->get();
        return view('livewire.users.sitmap.sitemap',['categories'=>$categories])->layout('layouts.users.app');
    }
}

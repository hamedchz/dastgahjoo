<?php

namespace App\Http\Livewire\Users\Index;

use App\Models\Category;
use Livewire\Component;

class IndexUsers extends Component
{
    public function render()
    {
        $categories = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->get();
        return view('livewire.users.index.index-users',['categories'=>$categories])->layout('layouts.users.app');
    }
}

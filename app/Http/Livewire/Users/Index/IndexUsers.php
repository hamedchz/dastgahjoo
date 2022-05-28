<?php

namespace App\Http\Livewire\Users\Index;

use App\Models\Category;
use App\Models\IndexText;
use Livewire\Component;

class IndexUsers extends Component
{
    public function render()
    {
        $categories = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->get();
        $firstPage = IndexText::first();
        return view('livewire.users.index.index-users',['firstPage'=>$firstPage,'categories'=>$categories])->layout('layouts.users.app');
    }
}

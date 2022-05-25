<?php

namespace App\Http\Livewire\Users\ProductList;

use App\Models\Category;
use Livewire\Component;

class ProductList extends Component
{
    public function render()
    {
        $categories = Category::with('parents')->with('products')->where('isActive',1)->where('parent',0)->get();

        return view('livewire.users.product-list.product-list',['categories'=>$categories])->layout('layouts.users.app');
    }
}

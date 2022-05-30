<?php

namespace App\Http\Livewire\Users\ProductList;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class SoldProducts extends Component
{
    use WithPagination;

    public $paginationTheme = 'bootstrap';

    public function render()
    {
        $categories = Category::with('parents')->with('products')->where('isActive',1)->where('parent',0)->get();
        $products = Product::with('images')->where('isActive',1)->
        where('isSold',1)->where('status','verified')->latest()->paginate(21);
        return view('livewire.users.product-list.sold-products',['categories'=>$categories,'products'=>$products])->layout('layouts.users.app');
    }
}

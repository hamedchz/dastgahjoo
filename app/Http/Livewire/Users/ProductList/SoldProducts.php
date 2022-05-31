<?php

namespace App\Http\Livewire\Users\ProductList;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class SoldProducts extends Component
{
    use SEOToolsTrait;
    use WithPagination;

    public $paginationTheme = 'bootstrap';

    public function render()
    {
        $this->seo()
        ->setTitle('محصولات فروخته شده ',false)
        ->setDescription('محصولات فروخته شده');
        $categories = Category::with('parents')->with('products')->where('isActive',1)->where('parent',0)->get();
        $products = Product::with('images')->where('isActive',1)->
        where('isSold',1)->where('status','verified')->latest()->paginate(21);
        return view('livewire.users.product-list.sold-products',['categories'=>$categories,'products'=>$products])->layout('layouts.users.app');
    }
}

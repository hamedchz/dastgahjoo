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
        $categories = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->take(4)->get();
        $categoriesCount = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->get();
        $categoriesFirsthalf = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->take($categoriesCount->count()/2)->get();
        $categoriesSecondhalf = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->skip($categoriesCount->count()/2)->take($categoriesCount->count()-$categoriesCount->count()/2)->get();
        $categories_second = Category::with('parents')->with('products')->where('isActive',1)->where('parent',0)->with('subproducts')->skip(4)->take($categoriesCount->count() - 4)->get();
        $products = Product::with('images')->where('isActive',1)->
        where('isSold',1)->where('status','verified')->latest()->paginate(21);
        return view('livewire.users.product-list.sold-products',['categoriesSecondhalf'=>$categoriesSecondhalf,'categoriesFirsthalf'=>$categoriesFirsthalf,'categoriesCount'=>$categoriesCount,'categories_second'=>$categories_second,'categories'=>$categories,'products'=>$products])->layout('layouts.users.app');
    }
}

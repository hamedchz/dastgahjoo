<?php

namespace App\Http\Livewire\Users\ProductList;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class SubcategoryProducts extends Component
{
    use WithPagination;

    public $slug;
    public $paginationTheme = 'bootstrap';

    public function mount($slug){
        $this->slug = $slug;
    }
    public function render()
    {
        $category = Category::with('parents')->where('slug',$this->slug)->first();
        $categories = Category::with('parents')->with('subproducts')->where('isActive',1)->where('parent',0)->get();
        $this->categories = $categories;
        //  $products = Category::with('products')->whereHas('products' , function($q){
        //      $q->where('status','verified')->where('isSold',0);
        //  })->where('slug',$slug)->orderBy('id','desc')->paginate(4);
        $products = Product::with('images')->where('subcategory_id',$category->id)->
        where('status','verified')->where('isSold',0)->where('isActive',1)->latest()->paginate(21);

        return view('livewire.users.product-list.subcategory-products',['products'=> $products,'categories'=>$categories,'category'=>$category])->layout('layouts.users.app');
    }
}

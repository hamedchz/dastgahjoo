<?php

namespace App\Http\Livewire\Users\ProductList;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class SubcategoryProducts extends Component
{
    use WithPagination;

    public $cat;
    public $paginationTheme = 'bootstrap';

    public function mount($slug){
        $cat = Category::where('slug',$slug)->where('isActive',1)->where('parent',0)->first();
        $this->cat = $cat;
        
    }
    public function render()
    {
       
        //  $products = Category::with('products')->whereHas('products' , function($q){
        //      $q->where('status','verified')->where('isSold',0);
        //  })->where('slug',$slug)->orderBy('id','desc')->paginate(4);
        $categories = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->take(4)->get();
        $categoriesCount = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->get();
        $categoriesFirsthalf = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->take($categoriesCount->count()/2)->get();
        $categoriesSecondhalf = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->skip($categoriesCount->count()/2)->take($categoriesCount->count()-$categoriesCount->count()/2)->get();
        $categories_second = Category::with('parents')->with('products')->where('isActive',1)->where('parent',0)->with('subproducts')->skip(4)->take($categoriesCount->count() - 4)->get();
        $subcategories = Category::with('subcategoryproducts')->where('isActive',1)->where('parent',$this->cat->id)->orderBy('id','desc')->paginate(21);
        
        // $products = Product::with('images')->where('subcategory_id',$category->id)->
        // where('status','verified')->where('isSold',0)->where('isActive',1)->latest()->paginate(21);

        return view('livewire.users.product-list.subcategory-products',['subcategories'=>$subcategories,'categoriesSecondhalf'=>$categoriesSecondhalf,'categoriesFirsthalf'=>$categoriesFirsthalf,'categoriesCount'=>$categoriesCount,'categories_second'=>$categories_second,'categories'=>$categories])->layout('layouts.users.app');
    }
}

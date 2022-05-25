<?php

namespace App\Http\Livewire\Users\ProductList;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductUserList extends Component
{
    use WithPagination;

    public $products;
    public $category;
    public $paginationTheme = 'bootstrap';

    public function mount($slug){
         $products = Category::with('products')->whereHas('products' , function($q){
             $q->where('status','verified')->where('isSold',0);
         })->where('slug',$slug)->get();
    
        // $products = Product::with('images')->with('category')->whereHas('category',function($q) use($slug){
        //     $q->where('slug',$slug);
        // })->where('isActive',1)->orderBy('id','desc')->paginate(21);
        
        $category = Category::with('parents')->where('slug',$slug)->first();
        $this->category = $category;
        // $products = Product::where('category_slug',$slug)->where('isActive',1)->paginate(21);
        $this->products = $products;
    }
    public function render()
    {
        $categories = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->get();
        return view('livewire.users.product-list.product-user-list',['categories'=>$categories])->layout('layouts.users.app');;
    }
}

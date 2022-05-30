<?php

namespace App\Http\Livewire\Users\ProductList;

use App\Models\Advertises;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ProductUserList extends Component
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
        $advertise = Advertises::where('category_id', $category->id)->where('expire_at','>=',Carbon::now())->get();
        $categories = Category::with('parents')->with('subproducts')->where('isActive',1)->where('parent',0)->get();
        $this->categories = $categories;
        //  $products = Category::with('products')->whereHas('products' , function($q){
        //      $q->where('status','verified')->where('isSold',0);
        //  })->where('slug',$slug)->orderBy('id','desc')->paginate(4);
        $products = Product::with('images')->where('category_id',$category->id)->
        where('status','verified')->where('isSold',0)->where('isActive',1)->latest()->paginate(21);
        // $advertise = Advertises::where('expire_at','>=',Carbon\Carbon::now())
        return view('livewire.users.product-list.product-user-list',['products'=> $products,'categories'=>$categories,'category'=>$category,'advertise'=>$advertise])->layout('layouts.users.app');
    }
}

<?php

namespace App\Http\Livewire\Users\ProductList;

use App\Models\Advertises;
use App\Models\Category;
use App\Models\Favorites;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Support\Facades\Auth;

class ProductUserList extends Component
{
    use SEOToolsTrait;
    use WithPagination;

    public $slug;
    public $paginationTheme = 'bootstrap';

    public function mount($slug){
        
        $this->slug = $slug;
    }


    public function storeWatchList(Product $product){
        $store = Favorites::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id
        ]);
    }
    public function render()
    {
        $cat = Category::with('parents')->where('slug',$this->slug)->where('parent',0)->first();
        $advertise = Advertises::where('category_id', $cat->id)->where('expire_at','>=',Carbon::now())->get();
        $categories = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->take(4)->get();
        $categoriesCount = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->get();
        $categories_second = Category::with('parents')->with('products')->where('isActive',1)->where('parent',0)->with('subproducts')->skip(4)->take($categoriesCount->count() - 4)->get();

        //  $products = Category::with('products')->whereHas('products' , function($q){
        //      $q->where('status','verified')->where('isSold',0);
        //  })->where('slug',$slug)->orderBy('id','desc')->paginate(4);
        $products = Product::with('images')->where('category_id',$cat->id)->
        where('status','verified')->where('isSold',0)->where('isActive',1)->latest()->paginate(21);
        // $advertise = Advertises::where('expire_at','>=',Carbon\Carbon::now())
        $this->seo()
        ->setTitle($cat->metaTitle,false)
        ->setDescription($cat->metaDescription);
        return view('livewire.users.product-list.product-user-list',['categoriesCount'=>$categoriesCount,'categories_second'=>$categories_second,'products' => $products,'categories' => $categories,'cat' => $cat,'advertise' => $advertise])->layout('layouts.users.app');
    }
}

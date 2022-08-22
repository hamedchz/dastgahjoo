<?php

namespace App\Http\Livewire\Users\ProductList;

use App\Models\Advertises;
use App\Models\Category;
use App\Models\Favorites;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\HeaderRepository;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class SubcategoryProducts extends Component
{
    use SEOToolsTrait;
    use WithPagination;

    public $cat;
    public $paginationTheme = 'bootstrap';

    public function mount($slug){
        $cat = Category::where('slug',$slug)->where('isActive',1)->where('parent',0)->first();
        $this->cat = $cat;
        
    }
    public function storeWatchList(Product $product){
        $store = Favorites::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id
        ]);
    }
    public function render()
    {
       
        //  $products = Category::with('products')->whereHas('products' , function($q){
        //      $q->where('status','verified')->where('isSold',0);
        //  })->where('slug',$slug)->orderBy('id','desc')->paginate(4);
        $products = Product::with('images')->where('category_id',$this->cat->id)->where('status','verified')->where('isSold',0)->where('isActive',1)->take(10)->latest()->get();
        $advertise = Advertises::where('category_id', $this->cat->id)->where('expire_at','>=',Carbon::now())->get();
        $subcategories = Category::with('subcategoryproductsVerified')->where('isActive',1)->where('parent',$this->cat->id)->orderBy('id','desc')->paginate(21);
        $categories = resolve(HeaderRepository::class)->categories();
        $categoriesCount = resolve(HeaderRepository::class)->categoriesCount();
        $categories_second = resolve(HeaderRepository::class)->categories_second();   
        $categoriesFirsthalf = resolve(HeaderRepository::class)->categoriesFirsthalf();
        $categoriesSecondhalf =resolve(HeaderRepository::class)->categoriesSecondhalf();
        
        // $products = Product::with('images')->where('subcategory_id',$category->id)->
        // where('status','verified')->where('isSold',0)->where('isActive',1)->latest()->paginate(21);
        $this->seo()
        ->setTitle($this->cat->title,false)
        ->setDescription($this->cat->title);
        return view('livewire.users.product-list.subcategory-products',['products' => $products,'advertise'=>$advertise,'subcategories'=>$subcategories,'categoriesSecondhalf'=>$categoriesSecondhalf,'categoriesFirsthalf'=>$categoriesFirsthalf,'categoriesCount'=>$categoriesCount,'categories_second'=>$categories_second,'categories'=>$categories])->layout('layouts.users.app');
    }
}

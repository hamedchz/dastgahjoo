<?php

namespace App\Http\Livewire\Admin\Seller\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\Images;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Video;
use App\Models\Logo;

class UserProductsLists extends Component
{
    use WithPagination;

    public $state = [];
    public $categories;
    public $subcategories = null;
    public $product = null;
    public $isStock,$city,$province,$productsImages=[],$productLogos=[],$productVideo=[],$description=null;

    public $paginationTheme = 'bootstrap';

    public function moreInformationModal($id){
        $product = Product::findOrFail($id);
        $this->product = $product;
        $this->description = $product->description;
        $this->state = $product->toArray();
        $this->city = $product->city->title;
        $this->province = $product->province->title;
        $categories = Category::where('id',$product->category_id)->first();
        $this->categories = $categories->title;
       
        if (!is_null($product->subcategory_id)) {
            $subcategories = Category::where('id',$product->subcategory_id)->first();
            $this->subcategories = $subcategories;
        }
        $this->dispatchBrowserEvent('informationModal');
    }
    public function showImage(){
    
        $productsImage = Images::where('product_id',$this->product->id)->get();
        $this->productsImages = $productsImage->toArray();
         $productVideos = Video::where('product_id',$this->product->id)->get();
        $this->productVideo = $productVideos->toArray();
        $productLogos = Logo::where('product_id',$this->product->id)->get();
        $this->productLogos = $productLogos->toArray();
        $this->dispatchBrowserEvent('show-productImages');
    }
    public function render()
    {
        $products = Product::where('vendor_id',auth()->user()->vendor->id)->orderBy('id','desc')->paginate(21);
        return view('livewire.admin.seller.product.user-products-lists',['products' => $products])->layout('layouts.admin.app');
    }
}

<?php

namespace App\Http\Livewire\Admin\Seller\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class UserProductsLists extends Component
{
    use WithPagination;

    public $state = [];
    public $categories;
    public $subcategories = null;
    public $product;
    public $isStock;

    public $paginationTheme = 'bootstrap';

    public function moreInformationModal(Product $product){
        $this->state = $product->toArray();

        $categories = Category::where('id',$product->category_id)->first();
        $this->categories = $categories->title;
        $this->product = $product;
        if (!is_null($product->subcategory_id)) {
            $subcategories = Category::where('id',$product->subcategory_id)->first();
            $this->subcategories = $subcategories;
        }
        $this->dispatchBrowserEvent('informationModal');
    }

    public function render()
    {
        $products = Product::where('vendor_id',auth()->user()->vendor->id)->orderBy('id','desc')->paginate(21);
        return view('livewire.admin.seller.product.user-products-lists',['products' => $products])->layout('layouts.admin.app');
    }
}

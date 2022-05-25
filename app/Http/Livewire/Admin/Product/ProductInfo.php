<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class ProductInfo extends Component
{
    use AuthorizesRequests;

    public $product;
    public function mount($id){
        $product = Product::with('vendor')->with('category')->with('images')->where('id',$id)->get();
        $this->product = $product;
    }
    public function render()
    {
        $this->authorize('products',Product::class);
        return view('livewire.admin.product.product-info')->layout('layouts.admin.app');
    }
}

<?php

namespace App\Http\Livewire\Users\AdvanceSearch;

use App\Models\Category;
use Livewire\Component;

class AdvanceSearch extends Component
{
    public function render()
    {
        $categories = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->get();
        return view('livewire.users.advance-search.advance-search',['categories'=>$categories])->layout('layouts.users.app');
    }
}

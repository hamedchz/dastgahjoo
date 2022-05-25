<?php

namespace App\Http\Livewire\Users\SearchMachine;

use App\Models\Category;
use Livewire\Component;

class SearchMachine extends Component
{
    public function render()
    {
        $categories = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->get();
        return view('livewire.users.search-machine.search-machine',['categories'=>$categories])->layout('layouts.users.app');
    }
}

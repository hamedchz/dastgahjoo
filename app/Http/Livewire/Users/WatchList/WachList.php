<?php

namespace App\Http\Livewire\Users\WatchList;

use App\Models\Category;
use Livewire\Component;

class WachList extends Component
{
    public function render()
    {
        $categories = Category::with('parents')->with('subproducts')->where('isActive',1)->where('parent',0)->get();
        return view('livewire.users.watch-list.wach-list',['categories'=>$categories])->layout('layouts.users.app');
    }
}

<?php

namespace App\Http\Livewire\Users\WatchList;

use App\Models\Category;
use App\Models\Favorites;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class WachList extends Component
{
    use SEOToolsTrait,WithPagination;

    public function mount(){
        if(!Auth::id()){
            return abort('403');
        }
    }
    public function render()
    {
        $this->seo()
        ->setTitle('لیست محصولات ذخیره شده',false)
        ->setDescription('لیست محصولات ذخیره شده');
        $categories = Category::with('parents')->with('subproducts')->where('isActive',1)->where('parent',0)->get();
        $favorites = Favorites::where('user_id',auth()->user()->id)->latest()->paginate(21);
        return view('livewire.users.watch-list.wach-list',['categories'=>$categories,'favorites'=>$favorites ])->layout('layouts.users.app');
    }
}

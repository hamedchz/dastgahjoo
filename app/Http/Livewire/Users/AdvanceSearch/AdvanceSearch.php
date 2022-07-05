<?php

namespace App\Http\Livewire\Users\AdvanceSearch;

use App\Models\Category;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class AdvanceSearch extends Component
{

    use SEOToolsTrait;
    
    public function render()
    {
        $categories = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->take(4)->get();
        $categoriesCount = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->get();
        $categoriesFirsthalf = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->take($categoriesCount->count()/2)->get();
        $categoriesSecondhalf = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->skip($categoriesCount->count()/2)->take($categoriesCount->count()-$categoriesCount->count()/2)->get();
        $categories_second = Category::with('parents')->with('products')->where('isActive',1)->where('parent',0)->with('subproducts')->skip(4)->take($categoriesCount->count() - 4)->get();
        $this->seo()
        ->setTitle('جستجوی پیشرفته ',false)
        ->setDescription('جستجوی پیشرفته  ');
        return view('livewire.users.advance-search.advance-search',['categoriesSecondhalf'=>$categoriesSecondhalf,'categoriesFirsthalf'=>$categoriesFirsthalf,'categoriesCount'=>$categoriesCount,'categories_second'=>$categories_second,'categories'=>$categories])->layout('layouts.users.app');
    }
}

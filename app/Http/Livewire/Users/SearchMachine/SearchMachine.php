<?php

namespace App\Http\Livewire\Users\SearchMachine;

use App\Models\Category;
use App\Models\MachineSearch;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class SearchMachine extends Component
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
        ->setTitle('جستجوی ماشین آلات',false)
        ->setDescription('جستجوی ماشین آلات');
        $searchTitle = MachineSearch::findOrFail(2);
        return view('livewire.users.search-machine.search-machine',['categoriesFirsthalf'=>$categoriesFirsthalf,'categoriesSecondhalf'=>$categoriesSecondhalf,'categoriesCount'=>$categoriesCount,'categories_second'=>$categories_second,'searchTitle'=>$searchTitle,'categories'=>$categories])->layout('layouts.users.app');
    }
}

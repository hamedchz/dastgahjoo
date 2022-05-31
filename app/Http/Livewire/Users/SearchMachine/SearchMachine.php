<?php

namespace App\Http\Livewire\Users\SearchMachine;

use App\Models\Category;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class SearchMachine extends Component
{
    use SEOToolsTrait;
    public function render()
    {
        $this->seo()
        ->setTitle('جستجوی ماشین آلات',false)
        ->setDescription('جستجوی ماشین آلات');
        $categories = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->get();
        return view('livewire.users.search-machine.search-machine',['categories'=>$categories])->layout('layouts.users.app');
    }
}

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
        $this->seo()
        ->setTitle('جستجوی پیشرفته ',false)
        ->setDescription('جستجوی پیشرفته  ');
        $categories = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->get();
        return view('livewire.users.advance-search.advance-search',['categories'=>$categories])->layout('layouts.users.app');
    }
}

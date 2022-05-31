<?php

namespace App\Http\Livewire\Users\Index;

use App\Models\Category;
use App\Models\IndexText;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
class IndexUsers extends Component
{
    use SEOToolsTrait;

    public function render()
    {
        $categories = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->get();
        $firstPage = IndexText::first();
        $this->seo()
        ->setTitle('خرید و فروش دستگاهها و ماشین ها ',false)
        ->setDescription('خرید و فروش دستگاهها و ماشین ها');
        return view('livewire.users.index.index-users',['firstPage'=>$firstPage,'categories'=>$categories])->layout('layouts.users.app');
    }
}

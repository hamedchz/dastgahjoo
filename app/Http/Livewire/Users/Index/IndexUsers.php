<?php

namespace App\Http\Livewire\Users\Index;

use App\Models\Advertises;
use App\Models\Category;
use App\Models\IndexText;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Carbon\Carbon;

class IndexUsers extends Component
{
    use SEOToolsTrait;

    public function render()
    {
        $categories = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->take(4)->get();
        $categoriesCount = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->get();
        $categoriesFirsthalf = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->take($categoriesCount->count()/2)->get();
        $categoriesSecondhalf = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->skip($categoriesCount->count()/2)->take($categoriesCount->count()-$categoriesCount->count()/2)->get();
        $categories_second = Category::with('parents')->with('products')->where('isActive',1)->where('parent',0)->with('subproducts')->skip(4)->take($categoriesCount->count() - 4)->get();
        $firstPage = IndexText::first();
        $advertises = Advertises::where('expire_at','>=',Carbon::now())->inRandomOrder() ->limit(5)->get();
        $this->seo()
        ->setTitle('خرید و فروش دستگاهها و ماشین ها ',false)
        ->setDescription('خرید و فروش دستگاهها و ماشین ها');
        return view('livewire.users.index.index-users',['categoriesSecondhalf'=>$categoriesSecondhalf,'categoriesFirsthalf'=>$categoriesFirsthalf,'categoriesCount'=>$categoriesCount,'categories_second'=>$categories_second,'advertises'=>$advertises,'firstPage'=>$firstPage,'categories'=>$categories])->layout('layouts.users.app');
    }
}

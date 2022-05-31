<?php

namespace App\Http\Livewire\Users\Sitmap;

use App\Models\Category;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class Sitemap extends Component
{
    use SEOToolsTrait;
    public function render()
    {
        $this->seo()
        ->setTitle('نقشه سایت',false)
        ->setDescription('نقشه سایت');
        $categories = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->get();
        return view('livewire.users.sitmap.sitemap',['categories'=>$categories])->layout('layouts.users.app');
    }
}

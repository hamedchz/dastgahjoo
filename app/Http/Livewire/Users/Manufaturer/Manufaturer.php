<?php

namespace App\Http\Livewire\Users\Manufaturer;

use App\Models\Category;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class Manufaturer extends Component
{
    use SEOToolsTrait;

    public function render()
    {
        $this->seo()
        ->setTitle('سازندگان ماشین آلات ',false)
        ->setDescription('سازندگان ماشین آلات');
        $categories = Category::with('parents')->with('products')->with('subproducts')->where('isActive',1)->where('parent',0)->get();
        return view('livewire.users.manufaturer.manufaturer',['categories'=>$categories])->layout('layouts.users.app');
    }
}

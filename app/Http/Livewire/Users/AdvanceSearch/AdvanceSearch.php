<?php

namespace App\Http\Livewire\Users\AdvanceSearch;

use App\Models\Category;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
 use App\Repositories\HeaderRepository;
 
class AdvanceSearch extends Component
{

    use SEOToolsTrait;

    public $subCategory= null;

    public function changeCategory($id){
        $subcategory = Category::where('parent',$id)->where('isActive',1)->get();
        $this->subCategory = $subcategory;
    }
    
    public function render()
    {
        $categories = resolve(HeaderRepository::class)->categories();
        $categoriesCount = resolve(HeaderRepository::class)->categoriesCount();
        $categoriesFirsthalf = resolve(HeaderRepository::class)->categoriesFirsthalf();
        $categoriesSecondhalf =resolve(HeaderRepository::class)->categoriesSecondhalf();
        $categories_second = resolve(HeaderRepository::class)->categories_second();   
        $this->seo()
        ->setTitle('جستجوی پیشرفته ',false)
        ->setDescription('جستجوی پیشرفته  ');
        return view('livewire.users.advance-search.advance-search',['categoriesSecondhalf'=>$categoriesSecondhalf,'categoriesFirsthalf'=>$categoriesFirsthalf,'categoriesCount'=>$categoriesCount,'categories_second'=>$categories_second,'categories'=>$categories])->layout('layouts.users.app');
    }
}

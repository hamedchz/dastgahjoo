<?php

namespace App\Http\Livewire\Users\SearchMachine;

use App\Models\Category;
use App\Models\MachineSearch;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Repositories\HeaderRepository;

class SearchMachine extends Component
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
        $categories_second = resolve(HeaderRepository::class)->categories_second();   
        $categoriesFirsthalf = resolve(HeaderRepository::class)->categoriesFirsthalf();
        $categoriesSecondhalf =resolve(HeaderRepository::class)->categoriesSecondhalf();
        $this->seo()
        ->setTitle('جستجوی ماشین آلات',false)
        ->setDescription('جستجوی ماشین آلات');
        $searchTitle = MachineSearch::findOrFail(2);
        return view('livewire.users.search-machine.search-machine',['categoriesFirsthalf'=>$categoriesFirsthalf,'categoriesSecondhalf'=>$categoriesSecondhalf,'categoriesCount'=>$categoriesCount,'categories_second'=>$categories_second,'searchTitle'=>$searchTitle,'categories'=>$categories])->layout('layouts.users.app');
    }
}

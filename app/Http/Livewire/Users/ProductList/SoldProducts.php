<?php

namespace App\Http\Livewire\Users\ProductList;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Repositories\HeaderRepository;
        
class SoldProducts extends Component
{
    use SEOToolsTrait;
    use WithPagination;

    public $paginationTheme = 'bootstrap';

    public function render()
    {
        $this->seo()
        ->setTitle('محصولات فروخته شده ',false)
        ->setDescription('محصولات فروخته شده');
        $categories = resolve(HeaderRepository::class)->categories();
        $categoriesCount = resolve(HeaderRepository::class)->categoriesCount();
        $categories_second = resolve(HeaderRepository::class)->categories_second();   
        $categoriesFirsthalf = resolve(HeaderRepository::class)->categoriesFirsthalf();
        $categoriesSecondhalf =resolve(HeaderRepository::class)->categoriesSecondhalf();
        $products = Product::with('images')->where('isActive',1)->
        where('isSold',1)->where('status','verified')->latest()->paginate(21);
        return view('livewire.users.product-list.sold-products',['categoriesSecondhalf'=>$categoriesSecondhalf,'categoriesFirsthalf'=>$categoriesFirsthalf,'categoriesCount'=>$categoriesCount,'categories_second'=>$categories_second,'categories'=>$categories,'products'=>$products])->layout('layouts.users.app');
    }
}

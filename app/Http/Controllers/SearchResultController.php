<?php

namespace App\Http\Controllers;

use App\Models\Category as ModelsCategory;
use App\Models\Product;
use App\QueryFilters\Category;
use App\QueryFilters\City;
use App\QueryFilters\DealerNo;
use App\QueryFilters\Manufacturer;
use App\QueryFilters\Name;
use App\QueryFilters\Price;
use App\QueryFilters\ProductModel;
use App\QueryFilters\ProductNo;
use App\QueryFilters\Sort;
use App\QueryFilters\Stock;
use App\QueryFilters\subCategory;
use App\QueryFilters\Year;
use App\QueryFilters\QuerySearch;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Livewire\WithPagination;
use App\Repositories\HeaderRepository;

class SearchResultController extends Controller
{
    use WithPagination;
    
    public function result(){
        $products = app(Pipeline::class)->send(Product::query())
        ->through([
            Name::class,
            Price::class,
            City::class,
            Manufacturer::class,
            Year::class,
            Category::class,
            DealerNo::class,
            ProductModel::class,
            ProductNo::class,
            Stock::class,
            Sort::class,
            subCategory::class,
            QuerySearch::class
        ])->thenReturn()->with('images')->with('category')->where('status','verified')
        ->where('isSold',0)->where('isActive',1)->latest()->paginate(20);
            // return $products;
        $categories = resolve(HeaderRepository::class)->categories();
        $categoriesCount = resolve(HeaderRepository::class)->categoriesCount();
        $categories_second = resolve(HeaderRepository::class)->categories_second($categoriesCount);

        return view('livewire.users.searchResult.result',compact('categoriesCount','categories_second','products','categories')); 
     }
}

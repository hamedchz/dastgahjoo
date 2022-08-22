<?php

namespace App\Http\Livewire\Users\Index;

use App\Models\Advertises;
use App\Models\Category;
use App\Models\Congratulation;
use App\Models\IndexText;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Repositories\HeaderRepository;

class IndexUsers extends Component
{
    use SEOToolsTrait;

    public function render()
    {
        $categories = resolve(HeaderRepository::class)->categories();
        $categoriesCount = resolve(HeaderRepository::class)->categoriesCount();
        $categoriesFirsthalf = resolve(HeaderRepository::class)->categoriesFirsthalf();
        $categoriesSecondhalf =resolve(HeaderRepository::class)->categoriesSecondhalf();
        $categories_second = resolve(HeaderRepository::class)->categories_second();      
        $firstPage = IndexText::first();
        $advertises = Advertises::where('expire_at','>=',Carbon::now())->inRandomOrder()->limit(5)->get();
        $congratualtion = Congratulation::first();
         if(Session::get('congratualtion')){
         if(Session::get('congratualtion') == $congratualtion->id){
            $congratualtion = null;
         }else{
            Session::put('congratualtion',$congratualtion->id);
         }
        }else{
            Session::put('congratualtion',$congratualtion->id);
         }
        $this->seo()
        ->setTitle('خرید و فروش دستگاهها و ماشین ها ',false)
        ->setDescription('خرید و فروش دستگاهها و ماشین ها');
        return view('livewire.users.index.index-users',['congratualtion'=>$congratualtion,'categoriesSecondhalf'=>$categoriesSecondhalf,'categoriesFirsthalf'=>$categoriesFirsthalf,'categoriesCount'=>$categoriesCount,'categories_second'=>$categories_second,'advertises'=>$advertises,'firstPage'=>$firstPage,'categories'=>$categories])->layout('layouts.users.app');
    }
}

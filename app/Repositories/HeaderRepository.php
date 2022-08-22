<?php
namespace App\Repositories;

use App\Models\Category;
use Illuminate\Http\Request;


class HeaderRepository {

        public function categories(){
            return Category::with('parents')->with('productsVerified')->with('subcategoryproductsVerified')
            ->where('isActive',1)->where('parent',0)->take(4)->orderBy('order_position','asc')->get();
        }

        public function categoriesCount(){
            return Category::with('parents')->with('productsVerified')->with('subcategoryproductsVerified')
            ->where('isActive',1)->where('parent',0)->orderBy('order_position','asc')->get();
        }

        public function categoriesFirsthalf(){
            return Category::with('parents')->with('productsVerified')->with('subcategoryproductsVerified')
            ->where('isActive',1)->where('parent',0)->take($this->categoriesCount()->count()/2)->orderBy('order_position','asc')->get();
        }

        public function categoriesSecondhalf(){
            return Category::with('parents')->with('productsVerified')->with('subcategoryproductsVerified')->where('isActive',1)
            ->where('parent',0)->skip($this->categoriesCount()->count()/2)->take($this->categoriesCount()->count()-$this->categoriesCount()->count()/2)->orderBy('order_position','asc')->get();
        }

        public function categories_second(){
           return Category::with('parents')->with('productsVerified')->where('isActive',1)
            ->where('parent',0)->with('subcategoryproductsVerified')->skip(4)->take($this->categoriesCount()->count() - 4)->orderBy('order_position','asc')->get();
        }

 }
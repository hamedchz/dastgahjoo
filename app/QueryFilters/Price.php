<?php
namespace App\QueryFilters;
use Closure;

class Price {

    public function handle($request,Closure $next){

        if(!request()->has('pricemin') && !request()->has('pricemax')){
            return $next($request);
        }
        $builder = $next($request);

        if(!request()->has('pricemin')){
            
            return $builder->orWhere('price','<',request()->pricemax);

        }
         if(!request()->has('pricemax')){
           
            // return $builder->whereBetween('price',[request()->pricemin,request()->pricemax]);
            return $builder->orWhere('price','>',request()->pricemin);


        }
        if(request()->has('pricemin') && request()->has('pricemax')){
            return $builder->whereBetween('price',[request()->pricemin,request()->pricemax]);

        }
        // $price = explode(",",request()->price);

    }
}
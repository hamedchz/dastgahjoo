<?php

namespace App\QueryFilters;
use Closure;

class subCategory {

    public function handle($request,Closure $next){

        if(!request()->has('subcategory')){
            return $next($request);
        }

        $builder = $next($request);

        return $builder->where('subcategory_id',request()->subcategory);

    }
}
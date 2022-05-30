<?php

namespace App\QueryFilters;
use Closure;

class Year {

    public function handle($request,Closure $next){

        if(!request()->has('year')){
            return $next($request);
        }

        $builder = $next($request);

        return $builder->where('year_of_manufacture',request()->year);

    }
}
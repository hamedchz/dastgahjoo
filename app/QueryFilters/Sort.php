<?php
namespace App\QueryFilters;
use Closure;

class Sort {

    public function handle($request,Closure $next){

        if(!request()->has('sort')){
            return $next($request);
        }

        $builder = $next($request);

        $sortItems = explode(",",request()->sort);

        return $builder->orderBy($sortItems[0],$sortItems[1]);

    }
}
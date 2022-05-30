<?php
namespace App\QueryFilters;
use Closure;

class ProductNo {

    public function handle($request,Closure $next){

        if(!request()->has('itemNo')){
            return $next($request);
        }

        $builder = $next($request);


        return $builder->where('itemNo',request()->itemNo);

    }
}
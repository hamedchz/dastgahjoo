<?php
namespace App\QueryFilters;
use Closure;

class Stock {

    public function handle($request,Closure $next){

        if(!request()->has('stock')){
            return $next($request);
        }

        $builder = $next($request);


        return $builder->where('isStock',request()->stock);

    }
}
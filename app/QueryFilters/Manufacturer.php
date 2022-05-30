<?php
namespace App\QueryFilters;
use Closure;

class Manufacturer {

    public function handle($request,Closure $next){

        if(!request()->has('manufacturer')){
            return $next($request);
        }

        $builder = $next($request);

        return $builder->where('Manufacturer','Like','%'.request()->Manufacturer.'%');

    }
}
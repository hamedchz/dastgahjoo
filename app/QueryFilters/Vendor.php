<?php
namespace App\QueryFilters;
use Closure;

class Vendor {

    public function handle($request,Closure $next){

        if(!request()->has('vendor')){
            return $next($request);
        }

        $builder = $next($request);


        return $builder->where('vendor_id',request()->vendor);

    }
}
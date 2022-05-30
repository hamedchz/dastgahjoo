<?php
namespace App\QueryFilters;
use Closure;

class DealerNo {

    public function handle($request,Closure $next){

        if(!request()->has('dealer')){
            return $next($request);
        }

        $builder = $next($request);


        return $builder->with('vendor')->whereHas('vendor',function($q) {
            $q->where('identityNumber',request()->dealer);
        });

    }
}
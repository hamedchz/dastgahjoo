<?php

namespace App\QueryFilters;
use Closure;

class QuerySearch {

    public function handle($request,Closure $next){

        if(!request()->has('queryTerm')){
            return $next($request);
        }
        $builder = $next($request);
        
        $searchValues = preg_split('/\s+/', request()->queryTerm, -1, PREG_SPLIT_NO_EMPTY); 
        // $searchValues = urldecode($searchValues);
        return $builder->where(function ($q) use ($searchValues) {
          foreach ($searchValues as $value) {
            $q->orWhere('name', 'like', "%{$value}%")->orWhere('itemNo','like', "%{$value}%")->orWhere('year_of_manufacture','like', "%{$value}%");
          }
        });
        //  $builder->with('images')->where('name','Like','%'.request()->name.'%')->
        // where('status','verified')->where('isSold',0)->where('isActive',1);

    }
}

<?php
namespace App\QueryFilters;
use Closure;

class City {

    public function handle($request,Closure $next){

        if(!request()->has('location')){
            return $next($request);
        }

        $builder = $next($request);
        $searchValues = preg_split('/\s+/', request()->location, -1, PREG_SPLIT_NO_EMPTY); 
        // $searchValues = urldecode($searchValues);
        return $builder->where(function ($q) use ($searchValues) {
          foreach ($searchValues as $value) {
            $q->orWhere('location', 'like', "%{$value}%");
          }
        });

        // return $builder->where('location','Like','%'.request()->location.'%');

    }
}
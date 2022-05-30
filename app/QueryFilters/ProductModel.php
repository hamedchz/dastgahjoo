<?php
namespace App\QueryFilters;
use Closure;

class ProductModel {

    public function handle($request,Closure $next){

        if(!request()->has('model')){
            return $next($request);
        }

        $builder = $next($request);
        $searchValues = preg_split('/\s+/', request()->model, -1, PREG_SPLIT_NO_EMPTY); 
        // $searchValues = urldecode($searchValues);
        return $builder->where(function ($q) use ($searchValues) {
          foreach ($searchValues as $value) {
            $q->orWhere('model', 'like', "%{$value}%");
          }
        });
        // return $builder->where('model','Like','%'.request()->model.'%');

    }
}
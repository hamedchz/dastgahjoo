<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,Sluggable,SoftDeletes;

    protected $fillable = [

        'category_id',
        'province_id',
        'city_id',
        'subcategory_id',
        'itemNo',
        'name',
        'quantity',
        'year_of_manufacture',
        'price',
        'manufacturer',
        'model',
        'type_of_machine',
        'description',
        'isStock',
        'location',
        'metaTitle',
        'metaDescription',
        'isInstallments',
        'isSold',
        'slug',
        'view',
        'status',
        'vendor_id',
        'site_url',
        'isActive'
    ];

    public function favorites(){
        return $this->hasMany(Favorites::class,'product_id','id');
    }
    public function orders(){
        return $this->morphToMany(Order::class,'orderable');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function vendor(){
        return $this->belongsTo(Vendors::class,'vendor_id','id');
    }
    public function images(){
        return $this->hasMany(Images::class,'product_id','id');
    }
    public function province(){
        return $this->hasOne(Province::class,'id','province_id');
    }
    public function city(){
        return $this->hasOne(City::class,'id','city_id');
    }
    public function getCreatedAtAttribute($created_at)
    {
        $v1 = new Verta($created_at);
        $v1 = $v1->format('Y-n-j');
        return $v1;
    }
 
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug'
            ]
        ];
    }

}

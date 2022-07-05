<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes,Sluggable;

    protected $fillable = [
        'title',
        'parent',
        'description',
        'metaTitle',
        'metaDescription',
        'slug',
        'isActive',
    ];
    public function products(){
        return $this->hasMany(Product::class,'category_id','id');
    }
     public function subcategoryproducts(){
        return $this->hasMany(Product::class,'subcategory_id','id');
    }
    public function advertises(){
        return $this->belongsTo(Advertises::class,'id','category_id');
    }
    public function subproducts(){
        return $this->hasMany(Product::class,'subcategory_id','id');
    }
    public function parents(){
        return $this->hasMany(Category::class,'parent');
    }
    public function getCreatedAtAttribute($created_at)
    {
        $v1 = new Verta($created_at);
        $v1 = $v1->format('H:i:s - Y/m/d');
        return $v1;
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}

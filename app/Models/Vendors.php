<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendors extends Model
{
    use HasFactory,SoftDeletes,Sluggable;

    protected $fillable = [
        'user_id',
        'phone',
        'mobile',
        'address',
        'city_id',
        'province_id',
        'isApproved',
        'package_id',
        'email',
        'logo',
        'slug',
        'fax',
        'contactPerson',
        'lat',
        'long',
        'identityNumber',
        'isQualified'
    ];

    public function package(){
        return $this->belongsTo(Packages::class,'package_id','id');
    }

    public function products(){
        return $this->hasMany(Product::class,'vendor_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function province(){
        return $this->belongsTo(Province::class,'province_id','id');
    }
    public function city(){
        return $this->belongsTo(City::class,'city_id','id');
    }

    public function getCreatedAtAttribute($created_at)
    {
        $v1 = new Verta($created_at);
        $v1 = $v1->format('Y');
        return $v1;
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'user.name'
            ]
        ];
    }


}

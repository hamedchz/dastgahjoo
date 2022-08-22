<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    use HasFactory;

    protected $table = "discount_code";

    protected $fillable = [
        'package_id',
        'code',
        'percentage',
        'isActive',
    ];
    
    public function package(){
        return $this->hasOne(Packages::class,'id','package_id');
    }
    public function userdiscount(){
        return $this->belongsTo(UserDiscounts::class,'id','discount_id');
    }
}

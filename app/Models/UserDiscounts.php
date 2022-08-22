<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDiscounts extends Model
{
    use HasFactory;

    protected $table = "user_discounts";
    protected $fillable = [
        'user_id',
        'discount_id',
        'package_id',
        'order_id',
    ];

    public function discountCode(){
        return $this->belongsTo(DiscountCode::class,'discount_id','id');
    }
    public function package(){
        return $this->hasOne(Packages::class,'id','package_id');
    }
}

<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status',
        'price',
        'isActive',
        'orderable_id',
        'orderable_type',
        'delivery',
    ];
    public function orderable(){
        return $this->morphTo();
    }
  
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function userDiscount(){
        return $this->hasOne(UserDiscounts::class,'order_id','id');

    }
  
    public function getCreatedAtAttribute($created_at)
    {
        $v1 = new Verta($created_at);
        $v1 = $v1->format('Y-n-j');
        return $v1;
    }
}

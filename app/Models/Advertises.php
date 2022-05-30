<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertises extends Model
{
    use HasFactory;
    protected $table = 'advertises';
    protected $fillable = [
        'category_id',
        'banner',
        'expire_at',
        'description',
        'duration'
    ];

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function getExpiredAtAttribute($expire_at)
    {
        $v1 = new Verta($this->expire_at);
        $v1 = $v1->format('H:i:s - Y/m/d');
        return $v1;
    }
    protected $casts = [
        'expire_at' => 'datetime',
    ];
}

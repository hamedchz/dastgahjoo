<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inquiries extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'title',
        'comment',
        'isPrice',
        'product_id',
        'vendor_id',
        'price',
        'moreInformation',
        'morePhotos',
        'offer',
        'status',
        'parent',
        'user_id',
        'email',
        'phone',
    ];

    public function parents(){
        return $this->hasMany(Inquiries::class,'parent','id');
    }
    public function getCreatedAtAttribute($created_at)
    {
        $v1 = new Verta($created_at);
        $v1 = $v1->format('Y/m/d');
        return $v1;
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function vendor(){
        return $this->belongsTo(Vendors::class,'vendor_id','id');
    }
    public function products(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function getStatusBadgeAttribute(){

        $badge = [
            'read'=> 'badge-success',
            'unread' => 'badge-danger'
        ];
        return $badge[$this->status];
    }
}

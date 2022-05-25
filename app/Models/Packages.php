<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Packages extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable= [
        'title',
        'price',
        'label',
        'products',
        'duration',
        'images',
        'logo',
        'banner',
        'video',
        'site',
        'file',
        'isActive',
    ];
    public function transaction()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }
    public function order()
    {
        return $this->morphMany(Order::class,'orderable');
    }
    public function vendors(){

        return $this->belongsTo(Vendors::class);
    }
    
    public function packageHistories(){
        return $this->belongsTo(PackageHistory::class,'id','package_id');
    }

    // public function getDurationDateAttribute(){
    //     $date = Carbon::createFromFormat('Y-m-d', $this->created_at);
    //     $daysToAdd = 5;
    //     $date = $date->addDays($daysToAdd);
    //     return $date;
    // }

    public function discount(){
        return $this->hasOne(Discounts::class,'package_id','id');
    }
}

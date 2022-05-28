<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageHistory extends Model
{
    use HasFactory;
    protected $table = 'history_packages';
    protected $fillable = [
        'user_id',
        'package_id',
        'price',
        'startDate',
        'endDate',
        'afterPrice',
        'label',
        'products',
        'duration',
        'images',
        'logo',
        'banner',
        'video',
        'site',
        'file',
        
    ];
    
    public function package(){
        return $this->belongsTo(Packages::class,'package_id','id');
    }
}

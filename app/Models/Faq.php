<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $table = 'faq';

    protected $fillable = [
        'user_id',
        'body',
        'isActive',
        'parent',
        'answer'
    ];

    public function parents(){
        return $this->hasMany(Faq::class,'parent');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Congratulation extends Model
{
    use HasFactory;
    

    protected $table = 'congratulation';

    protected $fillable = [
        'body',
        'image',
        'isActive',

    ];
}

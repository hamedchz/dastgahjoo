<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndexText extends Model
{
    use HasFactory;

    protected $table = 'index_text';

    protected $fillable = [
        'first_part',
        'second_part',
    ];
}

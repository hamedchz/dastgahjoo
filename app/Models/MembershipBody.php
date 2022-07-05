<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipBody extends Model
{
    use HasFactory;
    
    protected $table = 'membership_body';

    protected $fillable = [
        'first_part',
        'second_part',
    ];
}

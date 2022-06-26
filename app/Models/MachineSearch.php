<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineSearch extends Model
{
    use HasFactory;

    protected $table = 'machine_search';

    protected $fillable = [
        'user_id',
        'firstSection',
        'secondSection',
        'thirdSection',
        'forthSection',
        'fifthSection',
        'sixthSection',
        'isActive',
        
    ];
}

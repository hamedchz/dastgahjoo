<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contactus extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'contacts';

    protected $fillable =[
        'name',
        'mobile',
        'email',
        'subject',
        'description',
        'seen',
        'postal',
        'address',

    ];

    public function getCreatedAtAttribute($created_at)
    {
        $v1 = new Verta($created_at);
        $v1 = $v1->format('Y/m/d');
        return $v1;
    }
}

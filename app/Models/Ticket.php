<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [

        'user_id',
        'title',
        'description',
        'parent',
        'status',
    ];

    public function parents(){
        return $this->hasOne(Ticket::class,'parent','id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function getCreatedAtAttribute($created_at)
    {
        $v1 = new Verta($created_at);
        $v1 = $v1->format('Y/m/d');
        return $v1;
    }

    public function getStatusBadgeAttribute(){

        $badge = [
            'OPEN' => 'badge-primary',
            'CLOSED' => 'badge-success',
            'PENDING' => 'badge-warninng',
            'SUSPENDED' => 'badge-danger',
        ];

        return $badge[$this->status];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Hekmatinasser\Verta\Verta;

class Log extends Model
{
    use HasFactory;
  

    protected $fillable = ['user_id','action','description','ip'];
    
    public function storeLog($name,$desc,$action){
        Log::create([
            'user_id' => auth()->user()->id,
            'action' => $action,
            'description' => $desc. ' ' . $name,
            'ip' => $this->getUserIp()
        ]);
    }

    public function getUserIp(){
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else
                $ip = $_SERVER['REMOTE_ADDR'];
        return $ip;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($created_at)
    {
        $v1 = new Verta($created_at);
        $v1 = $v1->format('H:i:s - Y/m/d');
        return $v1;
    }

    public function getUpdatedAtAttribute($updated_at)
    {
        $v2 = new Verta($updated_at);
        $v2 = $v2->format('Y/m/d');
        return $v2;
    }

    public function getDeletedAtAttribute($deleted_at)
    {
        $v3 = new Verta($deleted_at);
        $v3 = $v3->format('Y/m/d');
        return $v3;
    }

    public function getActionBadgeAttribute(){
        $badgeColor = [
            'ویرایش' => 'badge-primary',
            'دیگر' => 'badge-info',
            'حذف' => 'badge-danger',
            'ایجاد' => 'badge-success',
        ];
        return $badgeColor[trim($this->action)];
    }
}

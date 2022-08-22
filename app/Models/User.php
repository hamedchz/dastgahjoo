<?php

namespace App\Models;

use App\Http\Controllers\PurchaseController;
use Hekmatinasser\Verta\Verta;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'email_verified_at',
        'mobile_verified_at',
        'avatar',
        'about',
        'isAdmin',
        'isActive',
    ];

    public function userDiscounts()
    {
        return $this->hasMany(UserDiscounts::class,'user_id','id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasPermission($permission)
    {
        return $this->permissions->contains('name',$permission->name) || $this->hasRole($permission->roles);
    }

    public function hasRole($roles)
    {
        return !! $roles->intersect($this->roles)->all();
    }
    public function logs(){
        return $this->belongsToMany(Log::class);
    }
    public function vendor(){
        return $this->hasOne(Vendors::class,'user_id','id');
    }
    
    public function historyPackages(){
        return $this->hasMany(PackageHistory::class,'user_id','id');
    }
    public function getCreatedAtAttribute($created_at)
    {
        $v1 = new Verta($created_at);
        $v1 = $v1->format('H:i:s - Y/m/d');
        return $v1;
    }
    public function transactions(){
        return $this->hasMany(Transaction::class,'user_id');
    }
    public function purchasePackage(){
        return $this->hasMany(PurchaseController::class,'user_id');

    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'password_confirmation',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'permission_id' => 'array'
    ];
   
}

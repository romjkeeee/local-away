<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;


class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps = false;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function showRoomLike()
    {
        return $this->hasMany(ShowRoomLike::class, 'user_id', 'id');
    }

    public function userAddress()
    {
        return $this->hasMany(UserAddress::class, 'user_id', 'id')
            ->where('status','show');
    }

    public function userSettings()
    {
        return $this->hasMany(UserSetting::class, 'user_id', 'id');
    }

    public function setPasswordAttribute($value)
    {
        if($value != ""){
            return $this->attributes['password'] = bcrypt($value);
        }
    }
}

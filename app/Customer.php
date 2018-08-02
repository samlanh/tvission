<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;
    protected $guard = "customer";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "tv_client";
    protected $fillable = [
        'fullName', 'email', 'password','note', 'gender', 'type','status', 'verifyCode', 'isverify','verifyDate', 'createBy', 'userId',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

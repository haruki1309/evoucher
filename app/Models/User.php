<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';

    protected $fillable = [
        'username', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function evouchers() {
        return $this->hasMany('App\Models\Evoucher');
    }

    public function brand() {
        return $this->belongsTo('App\Models\Brand');
    }
}

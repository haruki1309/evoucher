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
        'username', 'password', 'first_name', 'last_name', 'email'
    ];

    protected $attributes = [
        'is_admin' => 0,
        'is_brand_owner' => 0,
        'brand_id' => 2,
        'avt_url' => '',
        'is_activated' => 0,
        'lang_key' => 'vi_VN',
        'activation_key' => '',
        'reset_key' => '',
        'created_by' => 1,
        'updated_by' => 1
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

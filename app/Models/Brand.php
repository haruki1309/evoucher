<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brand';

    public function users() {
        return $this->hasMany('App\Models\User');
    }

    public function evouchers() {
        return $this->hasMany('App\Models\Evoucher');
    }

    public function evoucherCodes() {
        return $this->hasMany('App\Models\EvoucherCode');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evoucher extends Model
{
    protected $table = 'evoucher';

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function evoucherCodes() {
        return $this->hasMany('App\Models\EvoucherCode');
    }

    public function brand() {
        return $this->belongsTo('App\Models\Brand');
    }
}

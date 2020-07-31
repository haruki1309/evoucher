<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvoucherCode extends Model
{
    protected $table = 'evoucher_code';

    public function evoucher() {
        return $this->belongsTo('App\Models\Evoucher');
    }

    public function brand() {
        return $this->belongsTo('App\Models\Brand');
    }
}

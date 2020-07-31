<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    public function customerClassification() {
        return $this->belongsTo('App\Models\CustomerClassification');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerClassification extends Model
{
    protected $table = 'customer_classification';

    public function customers() {
        return $this->hasMany('App\Models\Customer');
    }
}

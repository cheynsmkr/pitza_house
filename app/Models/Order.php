<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'pizza_id',
        'total_order',
        'grand_total',
    ];

    public function getPizza(){
        return $this->belongsTo('App\Models\Pizza', 'pizza_id');

    }

}


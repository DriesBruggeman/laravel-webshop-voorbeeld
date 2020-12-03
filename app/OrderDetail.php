<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "order_details";

    public function Product(){
        return $this->belongsTo('App\Product');
    }

    public function Order(){
        return $this->belongsTo('App\Order');
    }
}

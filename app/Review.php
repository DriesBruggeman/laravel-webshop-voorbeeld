<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $table = "product_reviews";

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

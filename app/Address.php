<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
        'streetname', 'streetnumber', 'postalcode', 'city', 'country'
    ];

    public function User(){
        return $this->belongsTo('App\User');
    }

}

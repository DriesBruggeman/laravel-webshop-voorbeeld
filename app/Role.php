<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'user_roles';

    protected $fillable = [
        'role'
    ];

    public function users(){
        return $this->belongsToMany('App\User');
    }
}

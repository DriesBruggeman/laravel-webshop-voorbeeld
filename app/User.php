<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->hasMany('App\Role');
    }

    public function hasRole($role)
    {
        if($this->roles()->where('role', $role)->first()){
            return true;
        }

        return false;
    }

    public function fullname()
    {
        return $this->firstname . " " . $this->lastname;
    }

    public function Reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function Addresses()
    {
        return $this->HasMany('App\Address');
    }

    public function HasAddress()
    {
        $addresses = $this->Addresses;

        if(count($addresses) == 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function getAddress($type)
    {
        return $this->Addresses()->where('type', $type)->get();
    }

    public function Orders(){
        return $this->hasMany('App\Order');
    }


    /* orders
    public function Orders()
    {
        return $this->hasMany('App\Order');
    }*/
}

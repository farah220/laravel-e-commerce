<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{

    protected $guarded = ['password_confirmation'];
    protected $hidden = ['password'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function carts()
    {
      return $this->hasMany(Cart::class)->latest();
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

//    public function password()
//    {
//        return \Attribute::make
//    }

}

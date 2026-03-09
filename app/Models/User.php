<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
    ];

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function creditApplications() {
        return $this->hasMany(CreditApplication::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}

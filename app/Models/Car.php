<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name',
        'brand',
        'model',
        'year',
        'price',
        'mileage',
        'fuel_type',
        'transmission',
        'color',
        'stock',
        'description',
    ];

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function carImages() {
        return $this->hasMany(CarImage::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}

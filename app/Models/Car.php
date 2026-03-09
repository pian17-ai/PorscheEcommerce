<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name',
        'model',
        'year',
        'price',
        'top_speed',
        'fuel_type',
        'transmission',
        'color',
        'stock',
        'description',
        // 'image_url'
    ];

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    // public function carImages() {
    //     return $this->hasMany(CarImage::class, 'image_url');
    // }

    public function carImages() {
        return $this->hasMany(CarImage::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}

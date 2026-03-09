<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
        'order_id',
        'delivery_address',
        'courier',
        'tracking_number',
        'status',
        'shipped_at',
        'delivered_at',
    ];

    public function order() {
        return $this->belongsTo(Order::class);
    }
}

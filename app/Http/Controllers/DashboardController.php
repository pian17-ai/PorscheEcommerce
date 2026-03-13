<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Order;
use App\Models\User;
use App\Models\Delivery;

class DashboardController extends Controller
{
    public function index()
    {
        $cars = Car::count();
        $orders = Order::count();
        $users = User::count();
        $deliveries = Delivery::count();

        $recentOrders = Order::with(['user','car'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.index', compact(
            'cars',
            'orders',
            'users',
            'deliveries',
            'recentOrders'
        ));
    }
}

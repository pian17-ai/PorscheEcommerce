<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'car'])->latest()->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }

    public function create()
    {
        $users = User::all();
        $cars = Car::all();

        return view('admin.orders.create', compact('users', 'cars'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'car_id' => 'required',
            'order_type' => 'required',
            'total_price' => 'required|numeric',
            'status' => 'required',
        ]);

        Order::create($data);

        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully');
    }

    public function edit(Order $order)
    {
        $users = User::all();
        $cars = Car::all();

        return view('admin.orders.edit', compact('order', 'users', 'cars'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status updated');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('dashboard.orders.index')
            ->with('success', 'Order deleted successfully');
    }
}

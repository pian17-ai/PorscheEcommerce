<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
{
    $user = $request->user();

    $data = $request->validate([
        'car_id' => 'required|exists:cars,id',
        'order_type' => 'required|in:cash,credit',
        'total_price' => 'required|numeric',
    ]);

    // cek order ganda
    $alreadyOrdered = Order::where('user_id', $user->id)
        ->where('car_id', $data['car_id'])
        ->exists();

    if ($alreadyOrdered) {
        return redirect()->back()
            ->with('error', 'You have already ordered this car.');
    }

    $data['user_id'] = $user->id;
    $data['status'] = 'pending';

    $order = Order::create($data);

    // jika credit → isi form credit
    if ($data['order_type'] == 'credit') {
        return redirect()->route('client.credit.create', $order->id);
    }

    return redirect()->back()
        ->with('success', 'Order placed successfully!');
}

    public function index(Request $request)
{
    $orders = Order::with('car')
        ->where('user_id', $request->user()->id)
        ->latest()
        ->get();

    return view('client.orders.index', compact('orders'));
}

}

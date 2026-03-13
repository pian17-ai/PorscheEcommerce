<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::with(['order.user', 'order.car'])
            ->latest()
            ->paginate(10);

        return view('admin.deliveries.index', compact('deliveries'));
    }

    public function create(Order $order)
    {
        return view('admin.deliveries.create', compact('order'));
    }

    public function store(Request $request, Order $order)
    {
        $data = $request->validate([
            'delivery_address' => 'required',
            'courier' => 'required',
        ]);

        $data['tracking_number'] = 'TRK-'.strtoupper(Str::random(8));

        $data['order_id'] = $order->id;
        $data['status'] = 'waiting';

        Delivery::create($data);

        $order->update([
            'status' => 'shipping',
        ]);

        return redirect()->route('orders.index')
            ->with('success', 'Delivery created and order set to shipping');
    }

    public function update(Request $request, Delivery $delivery)
{
    $request->validate([
        'status' => 'required'
    ]);

    $delivery->update([
        'status' => $request->status
    ]);

    return back()->with('success', 'Delivery status updated.');
}

}

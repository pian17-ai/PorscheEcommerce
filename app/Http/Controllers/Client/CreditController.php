<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CreditApplication;
use App\Models\Order;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function create(Order $order)
    {
        return view('client.credit.create', compact('order'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'dp' => 'required|numeric',
            'tenor' => 'required|integer',
        ]);

        $order = Order::findOrFail($data['order_id']);

        // bunga berdasarkan tenor
        $interestRates = [
            12 => 3,
            24 => 4,
            36 => 5,
            48 => 6,
        ];

        $interestRate = $interestRates[$data['tenor']] ?? 5;

        $loan = $order->total_price - $data['dp'];

        $monthlyPayment = ($loan + ($loan * $interestRate / 100)) / $data['tenor'];

        CreditApplication::create([
            'order_id' => $order->id,
            'user_id' => $request->user()->id,
            'dp' => $data['dp'],
            'tenor' => $data['tenor'],
            'interest_rate' => $interestRate,
            'monthly_payment' => $monthlyPayment,
            'status' => 'pending',
        ]);

        return redirect()->route('client.orders.index')
            ->with('success', 'Credit application submitted!');
    }
}

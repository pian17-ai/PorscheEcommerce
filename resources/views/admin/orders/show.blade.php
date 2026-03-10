@extends('layouts.admin')

@section('title','Order Detail')
@section('page-title','Order Detail')

@section('content')

<div class="bg-white p-6 rounded shadow">

<h2 class="text-xl font-bold mb-4">
Order #{{ $order->id }}
</h2>

<p><b>Customer:</b> {{ $order->user->name }}</p>
<p><b>Email:</b> {{ $order->user->email }}</p>

<p><b>Car:</b> {{ $order->car->name }}</p>
<p><b>Order Type:</b> {{ $order->order_type }}</p>
<p><b>Total Price:</b> ${{ number_format($order->total_price,2) }}</p>

<p><b>Status:</b> {{ $order->status }}</p>

</div>

@if($order->payment)

<div class="bg-white p-6 rounded shadow mt-4">

<h3 class="font-bold mb-2">Payment</h3>

<p>Method: {{ $order->payment->payment_method }}</p>
<p>Status: {{ $order->payment->status }}</p>
<p>Amount: ${{ $order->payment->amount }}</p>

</div>

@endif

@if($order->delivery)

<div class="bg-white p-6 rounded shadow mt-4">

<h3 class="font-bold mb-2">Delivery</h3>

<p>Courier: {{ $order->delivery->courier }}</p>
<p>Status: {{ $order->delivery->status }}</p>
<p>Tracking: {{ $order->delivery->tracking_number }}</p>

</div>

@endif

@endsection

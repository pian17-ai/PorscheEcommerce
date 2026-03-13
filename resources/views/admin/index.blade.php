@extends('layouts.admin')

@section('title','Dashboard')
@section('page-title','Dashboard')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

{{-- TOTAL CARS --}}
<div class="bg-white p-6 rounded shadow">
    <h3 class="text-gray-500">Total Cars</h3>
    <p class="text-3xl font-bold">{{ $cars }}</p>
</div>

{{-- TOTAL ORDERS --}}
<div class="bg-white p-6 rounded shadow">
    <h3 class="text-gray-500">Total Orders</h3>
    <p class="text-3xl font-bold">{{ $orders }}</p>
</div>

{{-- TOTAL USERS --}}
<div class="bg-white p-6 rounded shadow">
    <h3 class="text-gray-500">Total Users</h3>
    <p class="text-3xl font-bold">{{ $users }}</p>
</div>

{{-- TOTAL DELIVERIES --}}
<div class="bg-white p-6 rounded shadow">
    <h3 class="text-gray-500">Total Deliveries</h3>
    <p class="text-3xl font-bold">{{ $deliveries }}</p>
</div>

</div>


{{-- RECENT ORDERS --}}
<div class="bg-white rounded shadow p-6">

<h2 class="text-xl font-bold mb-4">
Recent Orders
</h2>

<table class="w-full">

<thead class="border-b">
<tr>
    <th class="text-left py-2">Customer</th>
    <th class="text-left py-2">Car</th>
    <th class="text-left py-2">Price</th>
    <th class="text-left py-2">Status</th>
</tr>
</thead>

<tbody>

@foreach($recentOrders as $order)

<tr class="border-b">

<td class="py-2">
{{ $order->user->name }}
</td>

<td class="py-2">
{{ $order->car->name }}
</td>

<td class="py-2">
Rp {{ number_format($order->total_price,0,',','.') }}
</td>

<td class="py-2 capitalize">
{{ $order->status }}
</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection

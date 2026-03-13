@extends('layouts.admin')

@section('title','Create Delivery')

@section('content')

<h1 class="text-2xl font-bold mb-6">
Create Delivery
</h1>

<form action="{{ route('deliveries.store', $order->id) }}" method="POST" class="space-y-4">

@csrf

<div>
<label>Delivery Address</label>
<textarea name="delivery_address" class="border w-full p-2 rounded"></textarea>
</div>

<div>
<label>Courier</label>
<input type="text" name="courier" class="border w-full p-2 rounded">
</div>

<button class="bg-indigo-600 text-white px-4 py-2 rounded">
Create Delivery
</button>

</form>

@endsection

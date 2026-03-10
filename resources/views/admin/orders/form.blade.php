@php
    $isEdit = isset($order);
@endphp

@extends('layouts.admin')

@section('title', $isEdit ? 'Edit Order' : 'Create Order')
@section('page-title', $isEdit ? 'Edit Order' : 'Create Order')

@section('content')

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ $isEdit ? route('orders.update', $order->id) : route('orders.store') }}" method="POST"
        class="bg-white p-6 rounded shadow">
        @csrf

        @if ($isEdit)
            @method('PUT')
        @endif

        <div class="mb-4">
            <label class="block mb-1 font-medium">Customer</label>
            <select name="user_id" class="w-full border px-3 py-2 rounded">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}"
                        {{ old('user_id', $order->user_id ?? '') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Car</label>
            <select name="car_id" class="w-full border px-3 py-2 rounded">
                @foreach ($cars as $car)
                    <option value="{{ $car->id }}"
                        {{ old('car_id', $order->car_id ?? '') == $car->id ? 'selected' : '' }}>
                        {{ $car->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Order Type</label>
            <select name="order_type" class="w-full border px-3 py-2 rounded">
                <option value="cash">Cash</option>
                <option value="credit">Credit</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Total Price</label>
            <input type="number" step="0.01" name="total_price"
                value="{{ old('total_price', $order->total_price ?? '') }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Status</label>
            <select name="status" class="w-full border px-3 py-2 rounded">

                <option value="pending">Pending</option>
                <option value="paid">Paid</option>
                <option value="processing">Processing</option>
                <option value="shipping">Shipping</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>

            </select>
        </div>

        <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            {{ $isEdit ? 'Update' : 'Create' }}
        </button>

    </form>

@endsection

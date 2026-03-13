@extends('layouts.client')

@section('title', 'My Orders')

@section('content')

    <div class="max-w-6xl mx-auto">

        <h1 class="text-4xl font-bold mb-8">
            My Orders
        </h1>

        <div class="overflow-x-auto">

            <table class="w-full border border-gray-200">

                <thead class="bg-gray-900">

                    <tr class="text-white">
                        <th class="p-3 text-left">Car</th>
                        <th class="p-3 text-left">Model</th>
                        <th class="p-3 text-left">Order Type</th>
                        <th class="p-3 text-left">Price</th>
                        <th class="p-3 text-left">Status</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($orders as $order)
                        <tr class="border-t">

                            <td class="p-3">
                                {{ $order->car->name }}
                            </td>

                            <td class="p-3">
                                {{ $order->car->model }}
                            </td>

                            <td class="p-3">
                                {{ ucfirst($order->order_type) }}
                            </td>

                            <td class="p-3">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </td>

                            <td class="p-3">

                                @if ($order->status == 'pending')
                                    <span class="text-yellow-600 font-semibold">Pending</span>
                                @elseif($order->status == 'paid')
                                    <span class="text-blue-600 font-semibold">Paid</span>
                                @elseif($order->status == 'processing')
                                    <span class="text-purple-600 font-semibold">Processing</span>
                                @elseif($order->status == 'shipping')
                                    <span class="text-indigo-600 font-semibold">Shipping</span>
                                @elseif($order->status == 'completed')
                                    <span class="text-green-600 font-semibold">Completed</span>
                                @elseif($order->status == 'cancelled')
                                    <span class="text-red-600 font-semibold">Cancelled</span>
                                @endif

                            </td>

                        </tr>

                        {{-- DELIVERY DETAILS --}}
                        @if ($order->status == 'shipping' && $order->delivery)
                            <tr class="bg-gray-50 border-b">

                                <td colspan="5" class="p-4">

                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">

                                        <div>
                                            <p class="text-gray-500">Courier</p>
                                            <p class="font-semibold">{{ $order->delivery->courier }}</p>
                                        </div>

                                        <div>
                                            <p class="text-gray-500">Tracking Number</p>
                                            <p class="font-semibold">{{ $order->delivery->tracking_number }}</p>
                                        </div>

                                        <div>
                                            <p class="text-gray-500">Delivery Status</p>
                                            <p class="font-semibold capitalize">
                                                {{ $order->delivery->status }}
                                            </p>
                                        </div>

                                        <div>
                                            <p class="text-gray-500">Address</p>
                                            <p class="font-semibold">
                                                {{ $order->delivery->delivery_address }}
                                            </p>
                                        </div>

                                    </div>

                                </td>

                            </tr>
                        @endif

                    @empty

                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-500">
                                You have no orders yet.
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection

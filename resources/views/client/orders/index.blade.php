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
                        Rp {{ number_format($order->total_price,0,',','.') }}
                    </td>

                    <td class="p-3">

                        @if($order->status == 'pending')
                            <span class="text-yellow-600 font-semibold">
                                Pending
                            </span>
                        @elseif($order->status == 'approved')
                            <span class="text-green-600 font-semibold">
                                Approved
                            </span>
                        @else
                            <span class="text-red-600 font-semibold">
                                Rejected
                            </span>
                        @endif

                    </td>

                </tr>

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

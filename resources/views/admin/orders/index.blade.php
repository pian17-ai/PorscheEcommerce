@extends('layouts.admin')

@section('title', 'Orders')
@section('page-title', 'Orders')

@section('content')
    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-bold">Orders List</h2>

        <a href="{{ route('orders.create') }}" class="bg-blue-500 hover:bg-green-600 text-white px-4 py-2 rounded">

            Add Order

        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white rounded shadow overflow-hidden">

        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4">#</th>
                <th class="py-2 px-4">Customer</th>
                <th class="py-2 px-4">Car</th>
                <th class="py-2 px-4">Type</th>
                <th class="py-2 px-4">Total</th>
                <th class="py-2 px-4">Status</th>
                <th class="py-2 px-4">Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($orders as $order)
                <tr class="border-b">

                    <td class="py-2 px-4">
                        {{ $loop->iteration }}
                    </td>

                    <td class="py-2 px-4">
                        {{ $order->user->name }}
                    </td>

                    <td class="py-2 px-4">
                        {{ $order->car->name }}
                    </td>

                    <td class="py-2 px-4">
                        {{ ucfirst($order->order_type) }}
                    </td>

                    <td class="py-2 px-4">
                        ${{ number_format($order->total_price, 2) }}
                    </td>

                    <td class="py-2 px-4">

                        <form action="{{ route('orders.update', $order) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <select name="status" onchange="this.form.submit()" class="border px-2 py-1 rounded">

                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
                                    Processing
                                </option>
                                <option value="shipping" {{ $order->status == 'shipping' ? 'selected' : '' }}>Shipping
                                </option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed
                                </option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled
                                </option>

                            </select>

                        </form>

                    </td>

                    <td class="py-2 px-4">

                        <a href="{{ route('orders.show', $order->id) }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">

                            Detail

                        </a>

                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>

    <div class="mt-4">
        {{ $orders->links() }}
    </div>

@endsection

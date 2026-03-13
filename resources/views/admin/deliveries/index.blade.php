@extends('layouts.admin')

@section('title', 'Deliveries')
@section('page-title', 'Deliveries')

@section('content')

    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-bold">Deliveries List</h2>
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
                <th class="py-2 px-4">Courier</th>
                <th class="py-2 px-4">Tracking</th>
                <th class="py-2 px-4">Address</th>
                <th class="py-2 px-4">Status</th>
                {{-- <th class="py-2 px-4">Actions</th> --}}
            </tr>
        </thead>

        <tbody>

            @foreach ($deliveries as $delivery)
                <tr class="border-b">

                    <td class="py-2 px-4">
                        {{ $loop->iteration }}
                    </td>

                    <td class="py-2 px-4">
                        {{ $delivery->order->user->name }}
                    </td>

                    <td class="py-2 px-4">
                        {{ $delivery->order->car->name }}
                    </td>

                    <td class="py-2 px-4">
                        {{ $delivery->courier }}
                    </td>

                    <td class="py-2 px-4 font-mono text-sm">
                        {{ $delivery->tracking_number }}
                    </td>

                    <td class="py-2 px-4">
                        {{ $delivery->delivery_address }}
                    </td>

                    <td class="py-2 px-4">

                        <form action="{{ route('deliveries.update', $delivery->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <select name="status" onchange="this.form.submit()" class="border px-2 py-1 rounded">

                                <option value="waiting" {{ $delivery->status == 'waiting' ? 'selected' : '' }}>
                                    Waiting
                                </option>

                                <option value="shipped" {{ $delivery->status == 'shipped' ? 'selected' : '' }}>
                                    Shipped
                                </option>

                                <option value="on_delivery" {{ $delivery->status == 'on_delivery' ? 'selected' : '' }}>
                                    On Delivery
                                </option>

                                <option value="delivered" {{ $delivery->status == 'delivered' ? 'selected' : '' }}>
                                    Delivered
                                </option>

                            </select>

                        </form>

                    </td>

                    {{-- <td class="py-2 px-4 flex gap-2">

                        <a href="{{ route('deliveries.edit', $delivery->id) }}"
                            class="bg-yellow-400 hover:bg-yellow-500 px-2 py-1 rounded text-white">
                            Edit
                        </a>

                        <form action="{{ route('deliveries.destroy', $delivery->id) }}" method="POST"
                            onsubmit="return confirm('Delete this delivery?');">
                            @csrf
                            @method('DELETE')

                            <button class="bg-red-500 hover:bg-red-600 px-2 py-1 rounded text-white">
                                Delete
                            </button>

                        </form>

                    </td> --}}

                </tr>
            @endforeach

        </tbody>

    </table>

    <div class="mt-4">
        {{ $deliveries->links() }}
    </div>

@endsection

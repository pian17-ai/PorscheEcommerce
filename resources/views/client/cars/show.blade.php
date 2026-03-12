@extends('layouts.client')

@section('title', $car->name)

@section('content')

    <div class="max-w-5xl mx-auto">

        {{-- SUCCESS MESSAGE --}}
        @if (session('success'))
            <div class="bg-green-100/30 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- ERROR MESSAGE --}}
        @if (session('error'))
            <div class="bg-red-100/30 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        <h1 class="text-4xl font-bold mb-6">
            {{ $car->name }}
        </h1>

        {{-- images --}}
        <div class="grid grid-cols-1 gap-6 mb-8">

            @foreach ($car->carImages as $image)
                <img src="{{ asset('storage/' . $image->image_url) }}" class="w-full rounded-lg">
            @endforeach

        </div>

        {{-- CAR SPECIFICATIONS --}}
        <div class="bg-white/30 rounded-lg shadow p-6 mb-8">

            <h2 class="text-2xl font-bold mb-4">
                Car Specifications
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <p><strong>Model:</strong> {{ $car->model }}</p>

                <p><strong>Year:</strong> {{ $car->year }}</p>

                <p><strong>Price:</strong>
                    Rp {{ number_format($car->price, 0, ',', '.') }}
                </p>

                <p><strong>Top Speed:</strong> {{ $car->top_speed }} km/h</p>

                <p><strong>Fuel Type:</strong> {{ $car->fuel_type }}</p>

                <p><strong>Transmission:</strong> {{ $car->transmission }}</p>

                <p><strong>Color:</strong> {{ $car->color }}</p>

                <p><strong>Stock:</strong> {{ $car->stock }}</p>

            </div>

        </div>

        {{-- DESCRIPTION --}}
        <div class="mb-8">

            <h2 class="text-2xl font-bold mb-2">
                Description
            </h2>

            <p class="text-gray-700">
                {{ $car->description }}
            </p>

        </div>

        {{-- ORDER FORM --}}
        @auth

            <div class="bg-white/30 rounded-lg shadow p-6">

                <h2 class="text-2xl font-bold mb-4">
                    Order This Car
                </h2>

                <form action="{{ route('client.orders.store') }}" method="POST" class="space-y-4">

                    @csrf

                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                    <input type="hidden" name="total_price" value="{{ $car->price }}">

                    {{-- ORDER TYPE --}}
                    <div>

                        <label class="font-semibold">Order Type</label>

                        <select name="order_type" class="w-full border rounded-lg p-2 mt-1">

                            <option value="cash">Cash</option>
                            <option value="credit">Credit</option>

                        </select>

                    </div>

                    <button type="submit" class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition">

                        Order This Car

                    </button>

                </form>

            </div>
        @else
            <a href="{{ route('login') }}" class="bg-black text-white px-6 py-3 rounded-lg">

                Login to Order

            </a>

        @endauth

    </div>

@endsection

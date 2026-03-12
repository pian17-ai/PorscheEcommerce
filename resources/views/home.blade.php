@extends('layouts.client')

@section('title', 'Home')

@section('content')

    <h1 class="text-4xl font-bold mb-4">Welcome to Porsche Store</h1>

    <p class="mb-8">
        Explore the legendary Porsche lineup. Choose your favorite series and discover the performance within.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        {{-- 911 --}}
        <a href="{{ route('cars.index', ['type' => '911']) }}"
            class="rounded-lg overflow-hidden hover:scale-105 transition">

            @if ($p911 && $p911->carImages->first())
                <img src="{{ asset('storage/' . $p911->carImages->first()->image_url) }}" class="w-full h-48 object-cover">
            @endif

            <div class="p-4">
                <h2 class="text-4xl font-bold mb-2 text-center">Porsche 911</h2>

                <p>
                    The iconic sports car with rear-engine performance,
                    timeless design, and pure driving excitement.
                </p>
            </div>

        </a>

        {{-- Taycan --}}
        <a href="{{ route('cars.index', ['type' => 'taycan']) }}"
            class="rounded-lg overflow-hidden hover:scale-105 transition">

            @if ($taycan && $taycan->carImages->first())
                <img src="{{ asset('storage/' . $taycan->carImages->first()->image_url) }}" class="w-full h-48 object-cover">
            @endif

            <div class="p-4">
                <h2 class="text-4xl text-center font-bold mb-2">Porsche Taycan</h2>

                <p>
                    The fully electric Porsche delivering instant acceleration,
                    futuristic design, and sustainable performance.
                </p>
            </div>

        </a>

        {{-- 718 --}}
        <a href="{{ route('cars.index', ['type' => '718']) }}"
            class="rounded-lg overflow-hidden hover:scale-105 transition">

            @if ($p718 && $p718->carImages->first())
                <img src="{{ asset('storage/' . $p718->carImages->first()->image_url) }}" class="w-full h-48 object-cover">
            @endif

            <div class="p-4">
                <h2 class="text-4xl text-center font-bold mb-2">Porsche 718</h2>

                <p>
                    The fully electric Porsche delivering instant acceleration,
                    futuristic design, and sustainable performance.
                </p>
            </div>

        </a>

        {{-- Panamera --}}
        <a href="{{ route('cars.index', ['type' => 'panamera']) }}"
            class="rounded-lg overflow-hidden hover:scale-105 transition">

            @if ($panamera && $taycan->carImages->first())
                <img src="{{ asset('storage/' . $panamera->carImages->first()->image_url) }}" class="w-full h-48 object-cover">
            @endif

            <div class="p-4">
                <h2 class="text-4xl text-center font-bold mb-2">Porsche Panamera</h2>

                <p>
                    The fully electric Porsche delivering instant acceleration,
                    futuristic design, and sustainable performance.
                </p>
            </div>

        </a>

    </div>

@endsection

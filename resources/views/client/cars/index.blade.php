@extends('layouts.client')

@section('title', 'Cars')

@section('content')

<h1 class="text-4xl font-bold mb-6 text-center">
    Porsche {{ ucfirst($type) }}
</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">

@foreach ($cars as $car)

<a href="{{ route('cars.show', $car->id) }}"
   class="rounded-lg overflow-hidden hover:scale-105 transition">

    @if ($car->carImages->first())
        <img src="{{ asset('storage/' . $car->carImages->first()->image_url) }}"
             class="w-full h-32 object-cover">
    @endif

    <div class="p-4">

        <h2 class="text-2xl font-bold mb-2">
            {{ $car->name }}
        </h2>

        <p class="text-gray-600">
            Rp {{ number_format($car->price, 0, ',', '.') }}
        </p>

    </div>

</a>

@endforeach

</div>

@endsection

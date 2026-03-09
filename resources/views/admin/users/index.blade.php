@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1 class="text-4xl font-bold text-white mb-4">Welcome to CarStore</h1>
    <p class="text-white/80 mb-6">
        Explore our collection of the best cars available. Browse, compare, and find your dream car today!
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Contoh Card Mobil -->
        <div class="bg-white/20 backdrop-blur-md p-4 rounded-lg shadow-lg text-white">
            <h2 class="font-bold text-xl mb-2">Car Model A</h2>
            <p>High performance, stylish design, comfortable interior.</p>
        </div>
        <div class="bg-white/20 backdrop-blur-md p-4 rounded-lg shadow-lg text-white">
            <h2 class="font-bold text-xl mb-2">Car Model B</h2>
            <p>Eco-friendly, modern features, and great fuel efficiency.</p>
        </div>
        <div class="bg-white/20 backdrop-blur-md p-4 rounded-lg shadow-lg text-white">
            <h2 class="font-bold text-xl mb-2">Car Model C</h2>
            <p>Luxury interior, advanced safety, and smooth ride quality.</p>
        </div>
    </div>
@endsection

@php
    $isEdit = isset($car);
@endphp

@extends('layouts.admin')

@section('title', $isEdit ? 'Edit Car' : 'Add Car')
@section('page-title', $isEdit ? 'Edit Car' : 'Add Car')

@section('content')

@if($errors->any())
<div class="bg-red-100 text-red-700 p-3 rounded mb-4">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ $isEdit ? route('cars.update', $car->id) : route('cars.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div class="mb-4">
        <label class="block mb-1 font-medium">Name</label>
        <input type="text" name="name" value="{{ old('name', $car->name ?? '') }}" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-medium">Model</label>
        <input type="text" name="model" value="{{ old('model', $car->model ?? '') }}" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-medium">Year</label>
        <input type="number" name="year" value="{{ old('year', $car->year ?? '') }}" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-medium">Price</label>
        <input type="number" step="0.01" name="price" value="{{ old('price', $car->price ?? '') }}" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-medium">Top Speed</label>
        <input type="number" step="0.01" name="top_speed" value="{{ old('top_speed', $car->top_speed ?? '') }}" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-medium">Fuel Type</label>
        <input type="text" step="0.01" name="fuel_type" value="{{ old('fuel_type', $car->fuel_type ?? '') }}" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-medium">Transmission</label>
        <input type="text" step="0.01" name="transmission" value="{{ old('transmission', $car->transmission ?? '') }}" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-medium">Color</label>
        <input type="text" step="0.01" name="color" value="{{ old('color', $car->color ?? '') }}" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-medium">Stock</label>
        <input type="number" step="0.01" name="stock" value="{{ old('stock', $car->stock ?? '') }}" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-medium">Description</label>
        <input type="text" step="0.01" name="description" value="{{ old('description', $car->description ?? '') }}" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-medium">Image</label>
        <input type="file" name="image" class="w-full border px-3 py-2 rounded">
        @if($isEdit && $car->image)
            <img src="{{ asset('storage/'.$car->image) }}" class="w-32 h-20 object-cover mt-2 rounded">
        @endif
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
        {{ $isEdit ? 'Update' : 'Add' }}
    </button>
</form>

@endsection

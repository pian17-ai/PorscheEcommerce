@extends('layouts.admin')

@section('title', 'Cars')
@section('page-title', 'Cars')

@section('content')

    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-bold">Cars List</h2>
        <a href="{{ route('cars.create') }}" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 text-white rounded">
            Add Car
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
                <th class="py-2 px-4 text-left">#</th>
                <th class="py-2 px-4 text-left">Name</th>
                <th class="py-2 px-4 text-left">Model</th>
                <th class="py-2 px-4 text-left">Top Speed</th>
                <th class="py-2 px-4 text-left">Year</th>
                <th class="py-2 px-4 text-left">Price</th>
                <th class="py-2 px-4 text-left">Image</th>
                <th class="py-2 px-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr class="border-b">
                    <td class="py-2 px-4">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4">{{ $car->name }}</td>
                    <td class="py-2 px-4">{{ $car->model }}</td>
                    <td class="py-2 px-4">{{ $car->top_speed }}</td>
                    <td class="py-2 px-4">{{ $car->year }}</td>
                    <td class="py-2 px-4">${{ number_format($car->price, 2) }}</td>
                    <td class="py-2 px-4">
                        @if ($car->carImages->count())
                            @foreach ($car->carImages as $img)
                                <img src="{{ asset('storage/' . $img->image_url) }}" class="w-48 h-12 object-cover rounded">
                            @endforeach
                        @else
                            -
                        @endif
                    </td>
                    <td class="py-2 px-4 flex gap-2">
                        <a href="{{ route('cars.edit', $car->id) }}"
                            class="bg-yellow-400 hover:bg-yellow-500 px-2 py-1 rounded text-white">
                            Edit
                        </a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST"
                            onsubmit="return confirm('Delete this car?');">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 hover:bg-red-600 px-2 py-1 rounded text-white">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $cars->links() }}
    </div>

@endsection

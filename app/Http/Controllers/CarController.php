<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->paginate(10);

        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'price' => 'required|numeric',
            'top_speed' => 'required|integer',
            'fuel_type' => 'required|string|max:255',
            'transmission' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'stock' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $car = Car::create($data); // simpan mobil dulu

        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('cars', 'public');
            CarImage::create([
                'car_id' => $car->id,
                'image_url' => $file, // pastikan nama field sama dengan DB
            ]);
        }

        return redirect()->route('cars.index')->with('success', 'Car added successfully!');
    }

    public function show(Car $car)
    {
        return view('admin.cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'price' => 'required|numeric',
            'top_speed' => 'required|integer',
            'fuel_type' => 'required|string|max:255',
            'transmission' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'stock' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $car->update($data); // update data mobil

        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('cars', 'public');
            CarImage::create([
                'car_id' => $car->id,
                'image_url' => $file,
            ]);
        }

        return redirect()->route('cars.index')->with('success', 'Car updated successfully!');
    }

    public function destroy(Car $car)
    {
        foreach ($car->carImages as $img) {
            Storage::disk('public')->delete($img->image);
            $img->delete();
        }

        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully!');
    }
}

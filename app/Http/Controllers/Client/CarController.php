<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->type;

        $cars = Car::with('carImages')
            ->when($type, function ($query) use ($type) {
                $query->where('model', $type);
            })
            ->get();

        return view('client.cars.index', compact('cars', 'type'));
    }

    public function show(Car $car)
    {
        $car->load('carImages');

        return view('client.cars.show', compact('car'));
    }
}

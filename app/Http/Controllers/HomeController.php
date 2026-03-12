<?php

namespace App\Http\Controllers;

use App\Models\Car;

class HomeController extends Controller
{
    public function index()
    {
        $p911 = Car::with('carImages')
            ->where('model', '911')
            ->first();

        $taycan = Car::with('carImages')
            ->where('model', 'taycan')
            ->first();

        $p718 = Car::with('carImages')
            ->where('model', '718')
            ->first();

        $panamera = Car::with('carImages')
            ->where('model', 'panamera')
            ->first();

        return view('home', compact('p911', 'taycan', 'p718', 'panamera'));
    }
}

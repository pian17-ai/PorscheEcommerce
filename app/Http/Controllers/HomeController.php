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

        return view('home', compact('p911', 'taycan'));
    }
}

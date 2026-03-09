<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('home');
});

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth', 'admin')->group(function() {
    Route::get('/dashboard', function () {
        return view('layouts.admin');
    });

    Route::get('/dashboard/cars', function () {
        return view('admin.cars.index');
    });

    Route::resource('/dashboard/cars', CarController::class);

});
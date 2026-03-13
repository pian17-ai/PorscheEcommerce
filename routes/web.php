<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Client\CarController as ClientCarController;
use App\Http\Controllers\Client\CreditController as ClientCreditController;
use App\Http\Controllers\Client\OrderController as ClientOrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/cars', [ClientCarController::class, 'index'])->name('cars.index');
Route::get('/cars/{car}', [ClientCarController::class, 'show'])->name('cars.show');

Route::middleware('auth')->group(function () {
    Route::post('/orders', [ClientOrderController::class, 'store'])
        ->name('client.orders.store');

    Route::get('/my-orders', [ClientOrderController::class, 'index'])
        ->name('client.orders.index');

    Route::get('/credit/{order}/create', [ClientCreditController::class, 'create'])
        ->name('client.credit.create');

    Route::post('/credit', [ClientCreditController::class, 'store'])
        ->name('client.credit.store');
});

Route::middleware('auth', 'admin')->prefix('/dashboard')->group(function () {
    Route::get('/', function () {
        return view('layouts.admin');
    });

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/cars', CarController::class);

    Route::resource('/orders', OrderController::class);

    Route::get('/orders/{order}/delivery/create', [DeliveryController::class, 'create'])
        ->name('deliveries.create');

    Route::post('/orders/{order}/delivery', [DeliveryController::class, 'store'])
        ->name('deliveries.store');

    Route::resource('/deliveries', DeliveryController::class)->except(['show']);

    Route::get('/users', [UserController::class, 'index'])
    ->name('users.index');
});

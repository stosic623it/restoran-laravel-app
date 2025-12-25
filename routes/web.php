<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/menu', [FoodController::class, 'menu'])->name('menu');
Route::get('/cart', [OrderController::class, 'cart'])->name('cart');
Route::post('/order/confirm', [OrderController::class, 'confirm'])->name('order.confirm');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/order/add/{food}', [OrderController::class, 'add'])->name('order.add');
    Route::post('/order/confirm', [OrderController::class, 'confirm'])->name('order.confirm');

    Route::resource('categories', App\Http\Controllers\CategoryController::class);
    
    Route::resource('food', App\Http\Controllers\FoodController::class);
    
    Route::resource('orders', App\Http\Controllers\OrderController::class);
    Route::resource('order', OrderController::class);
});

require __DIR__.'/auth.php';


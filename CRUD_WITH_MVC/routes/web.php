<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('product' , [ProductController::class, 'index']);
    Route::get('category' , [CategoryController::class, 'index'])->name('category');
    Route::resource('cart', CartController::class)->names('cart');
    Route::get('favourite', [FavouriteController::class, 'index']);
    Route::post('favourite', [FavouriteController::class, 'store'])->name('favourite');
    Route::delete('favourite/{id}', [FavouriteController::class, 'destroy'])->name('favourite');
    Route::get('remove-cart/{id}', [CartController::class, 'destroy'])->name('remove-cart');
    Route::get('category/{id}/products', [ProductController::class, 'showProduct']);
});

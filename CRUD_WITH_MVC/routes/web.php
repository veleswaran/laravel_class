<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//  
// });
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('product', ProductController::class);
Route::resource('category', CategoryController::class);
Route::get('category/{id}/products',[ProductController::class,'showProduct']);

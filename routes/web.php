<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Products Rotası
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::post('/products/add', [ProductController::class, 'store'])->name('products.store');

//Carts Rotası
Route::middleware('auth')->group(function() {
    Route::get('/carts', [CartController::class, 'index'])->name('carts');
    Route::post('/carts/add', [CartController::class, 'store'])->name('carts.store');
    Route::delete('/carts/delete/{id}', [CartController::class, 'destroy'])->name('carts.destroy');
    Route::put('/carts/update/{id}', [CartController::class, 'update'])->name('carts.update');
});

//Orders Rotası
Route::middleware('auth')->group(function() {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::post('/orders/add/{id}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/orders/delete/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

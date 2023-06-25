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

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::post('/products', [ProductController::class, 'store']);

Route::middleware('auth')->get('/carts', [CartController::class, 'index'])->name('carts');
Route::post('/carts', [CartController::class, 'store']);
Route::delete('/carts/{id}', [CartController::class, 'destroy'])->name('carts.destroy');
Route::put('/carts/{id}', [CartController::class, 'update'])->name('carts.update');


Route::middleware('auth')->get('/orders', [OrderController::class, 'index'])->name('orders');
Route::post('/orders/{id}', [OrderController::class, 'update'])->name('orders.approve');
Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

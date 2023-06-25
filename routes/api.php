<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;


Route::get('/products', [ProductController::class, 'index'])->name('api.products');

Route::get('/carts/{id}', [CartController::class, 'index'])->name('api.carts');
Route::post('/carts/add', [CartController::class, 'store'])->name('api.carts.store');
Route::delete('/carts/delete/{id}', [CartController::class, 'destroy'])->name('api.carts.destroy');
Route::put('/carts/update/{id}', [CartController::class, 'update'])->name('api.carts.update');

Route::post('/orders/add', [OrderController::class, 'store'])->name('api.orders.store');







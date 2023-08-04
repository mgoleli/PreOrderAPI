<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\AuthController;
use Tymon\JWTAuth\Http\Middleware\Authenticate;

    Route::post('/login', [AuthController::class, 'login'])->name('api.login');

    //JWT kimlik doğrulaması uygulandı
    Route::middleware([Authenticate::class])->group(function (){
        Route::get('/products', [ProductController::class, 'index'])->name('api.products');
        Route::post('/products/add', [ProductController::class, 'store'])->name('api.products.add');
        
        Route::get('/carts/{id}', [CartController::class, 'index'])->name('api.carts');
        Route::post('/carts/add', [CartController::class, 'store'])->name('api.carts.store');
        Route::delete('/carts/delete/{id}', [CartController::class, 'destroy'])->name('api.carts.destroy');
        Route::put('/carts/update/{id}', [CartController::class, 'update'])->name('api.carts.update');
        
        Route::post('/orders/add', [OrderController::class, 'store'])->name('api.orders.store');
    });








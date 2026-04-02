<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\ProductController;

Route::get('/', function () {
    return view('home');
});

Route::get('/shop', function () {
    return view('shop');
});
Route::get('/backend/home', [HomeController::class, 'index'])->name('backend.home');
Route::get('/backend/product', [ProductController::class, 'index'])->name('backend.product');
Route::post('/backend/product/store', [ProductController::class, 'store'])->name('backend.product.store');
Route::put('/backend/product/{id}', [ProductController::class, 'update'])->name('backend.product.update');
Route::delete('/backend/product/{id}', [ProductController::class, 'destroy'])->name('backend.product.destroy');

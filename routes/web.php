<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\AccountController;
use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\SettingController;

Route::get('/', function () {
    return view('home');
});

Route::get('/queue', function () {
    return view('queue');
});

Route::get('/backend/home', [HomeController::class, 'index'])->name('backend.home');
Route::get('/backend/product', [ProductController::class, 'index'])->name('backend.product');
Route::post('/backend/product/store', [ProductController::class, 'store'])->name('backend.product.store');
Route::put('/backend/product/{id}', [ProductController::class, 'update'])->name('backend.product.update');
Route::delete('/backend/product/{id}', [ProductController::class, 'destroy'])->name('backend.product.destroy');

Route::get('/backend/account', [AccountController::class, 'index'])->name('backend.account');
Route::post('/backend/account/store', [AccountController::class, 'store'])->name('backend.account.store');
Route::put('/backend/account/{id}', [AccountController::class, 'update'])->name('backend.account.update');
Route::delete('/backend/account/{id}', [AccountController::class, 'destroy'])->name('backend.account.destroy');

Route::get('/backend/booking', [BookingController::class, 'index'])->name('backend.booking');
Route::post('/backend/booking/update-status/{id}', [BookingController::class, 'updateStatus']);
Route::delete('/backend/{id}', [BookingController::class, 'destroy'])->name('backend.booking.destroy');

Route::get('/backend/users', [UserController::class, 'index'])->name('backend.users');
Route::delete('/backend/users/destroy/{id}', [UserController::class, 'destroy'])->name('backend.users.destroy');
Route::post('/backend/users/change-level/{id}', [UserController::class, 'changeLevel'])->name('backend.users.change-level');

Route::get('/backend/settings', [SettingController::class, 'index'])->name('backend.settings');
Route::post('/backend/settings/update', [SettingController::class, 'update'])->name('backend.settings.update');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\HomeController as BackendHomeController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Backend\ProductController as BackendProductController;
use App\Http\Controllers\Backend\AccountController as BackendAccountController;
use App\Http\Controllers\Backend\BookingController as BackendBookingController;
use App\Http\Controllers\Backend\UserController as BackendUserController;
use App\Http\Controllers\Backend\SettingController as BackendSettingController;

Route::get('/home', [FrontendHomeController::class, 'index'])->name('frontend.home');
Route::get('/', [FrontendHomeController::class, 'index'])->name('frontend.home');

Route::get('/queue', function () {
    return view('queue');
});

Route::get('/sign-in', function () {
    return view('sign-in');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/backend/home', [BackendHomeController::class, 'index'])->name('backend.home');
Route::get('/backend/product', [BackendProductController::class, 'index'])->name('backend.product');
Route::post('/backend/product/store', [BackendProductController::class, 'store'])->name('backend.product.store');
Route::put('/backend/product/{id}', [BackendProductController::class, 'update'])->name('backend.product.update');
Route::delete('/backend/product/{id}', [BackendProductController::class, 'destroy'])->name('backend.product.destroy');

Route::get('/backend/account', [BackendAccountController::class, 'index'])->name('backend.account');
Route::post('/backend/account/store', [BackendAccountController::class, 'store'])->name('backend.account.store');
Route::put('/backend/account/{id}', [BackendAccountController::class, 'update'])->name('backend.account.update');
Route::delete('/backend/account/{id}', [BackendAccountController::class, 'destroy'])->name('backend.account.destroy');

Route::get('/backend/booking', [BackendBookingController::class, 'index'])->name('backend.booking');
Route::post('/backend/booking/update-status/{id}', [BackendBookingController::class, 'updateStatus']);
Route::delete('/backend/{id}', [BackendBookingController::class, 'destroy'])->name('backend.booking.destroy');

Route::get('/backend/users', [BackendUserController::class, 'index'])->name('backend.users');
Route::delete('/backend/users/destroy/{id}', [BackendUserController::class, 'destroy'])->name('backend.users.destroy');
Route::post('/backend/users/change-level/{id}', [BackendUserController::class, 'changeLevel'])->name('backend.users.change-level');

Route::get('/backend/settings', [BackendSettingController::class, 'index'])->name('backend.settings');
Route::post('/backend/settings/update', [BackendSettingController::class, 'update'])->name('backend.settings.update');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\HomeController as BackendHomeController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\QueueController as FrontendQueueController;
use App\Http\Controllers\Frontend\HistoryController as FrontendHistoryController;
use App\Http\Controllers\Backend\ProductController as BackendProductController;
use App\Http\Controllers\Backend\AccountController as BackendAccountController;
use App\Http\Controllers\Backend\BookingController as BackendBookingController;
use App\Http\Controllers\Backend\UserController as BackendUserController;
use App\Http\Controllers\Backend\SettingController as BackendSettingController;
use App\Http\Controllers\Frontend\QueueController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Backend\Setting;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\ProfileController;

Route::get('/home', [FrontendHomeController::class, 'index'])->name('frontend.home');
Route::get('/', [FrontendHomeController::class, 'index'])->name('frontend.home');
Route::get('/queue', [FrontendQueueController::class, 'index'])->name('frontend.queue');
Route::get('/maintenance', function () {
    $web_cfg = Setting::first();

    if (!$web_cfg || $web_cfg->maintenance_mode == 0) {
        return redirect('/');
    }

    return view('maintenance', compact('web_cfg'));
})->name('maintenance');

Route::get('/policy', function () {
    return view('policy');
})->name('privacy_policy.page');

Route::get('/terms', function () {
    return view('terms');
})->name('terms_conditions.page');

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.page');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.store');

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.page');
    Route::post('/login', [LoginController::class, 'login'])->name('login.store');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/history', [FrontendHistoryController::class, 'index'])->name('frontend.history');
    Route::post('/history/cancel/{id}', [FrontendHistoryController::class, 'cancel'])->name('frontend.history.cancel');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/booking/store', [QueueController::class, 'store'])->name('booking.store');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
Route::get('/logout', fn() => abort(404));

Route::middleware(['auth', 'is_admin'])->prefix('backend')->group(function () {

    Route::get('/home', [BackendHomeController::class, 'index'])->name('backend.home');

    Route::get('/product', [BackendProductController::class, 'index'])->name('backend.product');
    Route::post('/product/store', [BackendProductController::class, 'store'])->name('backend.product.store');
    Route::put('/product/{id}', [BackendProductController::class, 'update'])->name('backend.product.update');
    Route::delete('/product/{id}', [BackendProductController::class, 'destroy'])->name('backend.product.destroy');

    Route::get('/account', [BackendAccountController::class, 'index'])->name('backend.account');
    Route::post('/account/store', [BackendAccountController::class, 'store'])->name('backend.account.store');
    Route::put('/account/{id}', [BackendAccountController::class, 'update'])->name('backend.account.update');
    Route::delete('/account/{id}', [BackendAccountController::class, 'destroy'])->name('backend.account.destroy');

    Route::get('/booking', [BackendBookingController::class, 'index'])->name('backend.booking');
    Route::post('/booking/update-status/{id}', [BackendBookingController::class, 'updateStatus']);
    Route::delete('/booking/{id}', [BackendBookingController::class, 'destroy'])->name('backend.booking.destroy');
    Route::post('/booking/bulk-update', [BackendBookingController::class, 'bulkUpdate'])->name('backend.booking.bulk_update');

    Route::get('/users', [BackendUserController::class, 'index'])->name('backend.users');
    Route::delete('/users/destroy/{id}', [BackendUserController::class, 'destroy'])->name('backend.users.destroy');
    Route::post('/users/change-level/{id}', [BackendUserController::class, 'changeLevel'])->name('backend.users.change-level');

    Route::put('/backend/users/{id}/update', [BackendUserController::class, 'update'])->name('backend.users.update');

    Route::get('/settings', [BackendSettingController::class, 'index'])->name('backend.settings');
    Route::post('/settings/update', [BackendSettingController::class, 'update'])->name('backend.settings.update');
});

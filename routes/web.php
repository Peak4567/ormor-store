<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/shop', function () {
    return view('shop');
});
Route::get('/backend/home',function(){
    return view('backend/home');
});

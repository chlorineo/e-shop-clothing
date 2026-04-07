<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/category', function () {
    return view('category');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/product', function () {
    return view('product');
});

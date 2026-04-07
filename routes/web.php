<?php

use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/category', function () {
    return view('category', [
        'products' => Schema::hasTable('products')
            ? Product::query()->orderBy('id')->get()
            : collect(),
    ]);
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
<<<<<<< HEAD
Route::get('/shop-page', [ShopPageController::class, 'index'])->name('shop-page');
=======
Route::get('shop-page', [HomeController::class, 'show'])->name('shop');
>>>>>>> 9f587f4 (Update modified files)

<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop-page', [ShopPageController::class, 'index'])->name('shop-page');
Route::get('/shop', [ShopPageController::class, 'index'])->name('shop');
Route::get('/product/{id}', [ShopPageController::class, 'show'])->name('product');

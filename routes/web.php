<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductStatusesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/exit', [HomeController::class, 'exit'])->name('exit');


Route::get('/dashboard', [HomeController::class, 'home'])->middleware('auth')->name('home');

Route::middleware('auth')->group(function ()
{

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/wishlist/toggle', [ProductStatusesController::class, 'toggleWishlist']);
    Route::post('/cart/toggle', [ProductStatusesController::class, 'toggleCart']);
    Route::get('/wishlist', [ProductStatusesController::class, 'wishlist']);
    Route::get('/cart', [ProductStatusesController::class, 'cart']);

});

require __DIR__.'/auth.php';

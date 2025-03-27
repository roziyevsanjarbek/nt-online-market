<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DiscountProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductStatusesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/filter', [ProductsController::class, 'show'])->name('filter');
Route::post('/', [DiscountProductController::class, 'store'])->name('discount.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function ()
{

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth:sanctum')->group(function ()
{
    Route::post('/wishlist/toggle', [ProductStatusesController::class, 'toggleWishlist']);
    Route::post('/cart/toggle', [ProductStatusesController::class, 'toggleCart']);
    Route::get('/wishlist', [ProductStatusesController::class, 'wishlist']);
    Route::get('/cart', [ProductStatusesController::class, 'cart']);
});


require __DIR__.'/auth.php';

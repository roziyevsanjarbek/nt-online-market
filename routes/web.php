<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\GenerateCustomerToken;
use Illuminate\Support\Facades\Route;

Route::middleware(GenerateCustomerToken::class)->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/filter',[ProductsController::class, 'show'])->name('filter');



    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


    Route::middleware('auth')->group(function ()
    {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});





require __DIR__.'/auth.php';

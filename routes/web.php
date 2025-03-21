<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("/test", [ProductsController::class, "show"])->name("test");


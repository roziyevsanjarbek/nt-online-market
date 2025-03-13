<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadFileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload_file', function () {
    return view('upload_file');
});

Route::resource('/upload_file', UploadFileController::class);

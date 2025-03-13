<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload_file', function () {
    return view('upload_file');
});
Route::post('upload_file', function () {
    $request = request();
    $file = $request->file('file');
    $file_path = $file->store('uploads', 'public');
    dd($file_path);
});

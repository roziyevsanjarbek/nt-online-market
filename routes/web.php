<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/upload', function () {
    return view('upload_file'); // upload_file.blade.php ni chaqiramiz
})->name('upload.form');

Route::post('/upload', function (Request $request) {
    $request->validate([
        'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
    ]);

    $path = $request->file('image')->store('uploads', 'public'); // storage/app/public/uploads

    return back()->with('success', 'Rasm muvaffaqiyatli yuklandi!')->with('path', $path);
})->name('upload.image');

Route::get('/images', function () {
    $files = Storage::disk('public')->files('uploads');
    return view('image_list', compact('files'));
})->name('images.list');

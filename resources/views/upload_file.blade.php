<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rasm Yuklash</title>
</head>
<body>
<h2>Rasm Yuklash</h2>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    <img src="{{ asset('storage/' . session('path')) }}" alt="Yuklangan rasm" width="200">
@endif

<form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" accept="image/*" required>
    <button type="submit">Yuklash</button>
</form>

<a href="{{ route('images.list') }}">Yuklangan rasmlarni ko‘rish</a>
</body>
</html>

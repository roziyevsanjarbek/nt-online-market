<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yuklangan rasmlar</title>
</head>
<body>
<h2>Yuklangan Rasmlar</h2>

@foreach($files as $file)
    <div>
        <img src="{{ asset('storage/' . $file) }}" alt="Rasm" width="200">
        <p>{{ $file }}</p>
    </div>
@endforeach

<br>
<a href="{{ route('upload.form') }}">Yangi rasm yuklash</a>
</body>
</html>

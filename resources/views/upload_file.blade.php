<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>
<h2>Upload Image or File</h2>
<form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" id="file">
    <button type="submit">Upload</button>
</form>

@if (session('success'))
    <p>{{ session('success') }}</p>
    @if (session('relativePath'))
        <img src="{{ asset('storage/' . session('relativePath')) }}" alt="Uploaded Image" style="max-width: 500px;">
    @endif
@endif
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rasm Yuklash</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        input[type="file"] {
            margin: 10px 0;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background-color: #218838;
        }
        .success {
            color: green;
            font-weight: bold;
        }
        img {
            margin-top: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
        .link {
            display: inline-block;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
        }
        .link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Rasm Yuklash</h2>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
        <img src="{{ asset('storage/' . session('path')) }}" alt="Yuklangan rasm" width="200">
    @endif

    <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" accept="image/*" required>
        <br>
        <button type="submit">Yuklash</button>
    </form>

    <a class="link" href="{{ route('images.list') }}">Yuklangan rasmlarni ko‘rish</a>
</div>
</body>
</html>

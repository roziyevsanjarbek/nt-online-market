<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yuklangan rasmlar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 80%;
            max-width: 600px;
        }
        .image-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 15px;
        }
        img {
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
        .link {
            display: inline-block;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        .link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Yuklangan Rasmlar</h2>

    @foreach($files as $file)
        <div class="image-box">
            <img src="{{ asset('storage/' . $file) }}" alt="Rasm" width="200">
            <p>{{ $file }}</p>
        </div>
    @endforeach

    <a class="link" href="{{ route('upload.form') }}">Yangi rasm yuklash</a>
</div>
</body>
</html>

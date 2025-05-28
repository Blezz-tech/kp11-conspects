<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <link rel="icon" type="image/x-icon" href="{{asset('logo.png')}}">
    <title>Портал</title>
</head>
<body>
    <x-navbar />
    <x-info-message />
    <div class="container mt-3">
        {{ $slot }}
    </div>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>

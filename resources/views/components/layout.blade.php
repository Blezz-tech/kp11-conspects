<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>Портал</title>
</head>
<body>
    <x-navbar />
    <x-error-message />
    <div class="container mt-3">
        {{ $slot }}
    </div>
    <script src="/js/bootstrap.bundle.js"></script>
</body>
</html>

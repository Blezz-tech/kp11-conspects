<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('/css/main.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="icon" href="{{ asset('/img/logo.png') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

    <title>Document</title>
</head>

<body>
    <nav class="navbar bg-dark pb-4 pt-4" data-bs-theme="dark">
        <div class="container d-flex">
            <a class="navbar-brand" href="{{ route('about') }}">О нас</a>
            <a class="navbar-brand" href="{{ route('catalog') }}">Каталог</a>
            {{-- <a class="navbar-brand" href="{{route('contacts')}}">Контакты</a> --}}

            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Поиск">
                <button class="btn btn-outline-success" type="submit">Поиск</button>
            </form>

            <div class="d-flex" style="width: max-content">
                @guest
                    <a class="btn btn-secondary" href="{{ route('auth.create') }}">Зарегистрироваться</a>
                    <a class="btn btn-success" href="{{ route('auth.loginform') }}">Вход</a>
                @endguest
                @auth
                    <a class="btn btn-secondary" href="{{ route('auth.logout') }}">Выйти</a>|
                @endauth
            </div>
        </div>
    </nav>
    <div class="container p-4">
        @if (session()->has('info'))
            <div class="alert alert-success fade show d-flex justify-content-between">
                <p style="margin: 0">{{ session('info') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss='alert'></button>
            </div>
        @endif

        @yield('content')
    </div>
    {{-- <footer class="container-fluid mt-5">
        <div class="border-top border-secondary text-center">
            © Все права защищены и подтверждены
        </div>
    </footer> --}}
    <script src="{{ asset('/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
    <script src="{{ asset('/js/jquery-3.6.4.min.js') }}"></script>
</body>

</html>

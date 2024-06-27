<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css\bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{asset('свой css файл если успеем'}}"> --}}
    <title>Авоська</title>
</head>

<body>

    <!-- <div class="container"> -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="">
                <img src="{{ asset('img\3.png') }}" width="30" height="24" alt="">
            </a>
            <a class="navbar-brand" href="{{ route('home') }}">Главная</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('regform') }}">Регистрация</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('loginform') }}">Вход</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('mytickets') }}">Мои записи</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('createticket') }}">Записаться</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('logout') }}">Выйти</a>
                        </li>
                    @endauth
                    {{-- @if(Auth::check() && Auth::user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('showpanel') }}">Все записи</a>
                        </li>
                    @endif --}}
                    {{-- @auth('admin')
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('showpanel') }}">Все записи</a>
                        </li>
                    @endauth --}}
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        @if (session('info'))
            <div class="alert alert-success" role="alert">
                {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>

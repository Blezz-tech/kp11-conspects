<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{route('admin')}}">Главная</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    {{-- <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="#">Главная</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('admin_orders')}}">Заявки</a>
                    </li>
                </ul>
                <div class="d-flex gap-4">
                    @auth
                        <a href="{{ route('logout') }}" class="btn btn-success">Выход</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        @if (session()->has('info'))
            <div class="alert alert-success mt-5 fade show d-flex justify-content-between">
                <p style="margin: 0">{{ session('info') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss='alert'></button>
            </div>
        @endif

        @yield('content')
    </div>
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
</body>

</html>

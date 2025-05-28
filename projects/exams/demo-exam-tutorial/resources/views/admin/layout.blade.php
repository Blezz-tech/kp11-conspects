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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('adminhome')}}">Панель администратора</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="{{ route('categories.index') }}">Категории товаров</a>


                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('products.index')}}">Товары</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('admin.orders.index')}}">Заказы</a> <!--будет потом....наверное...-->
                    </li>

                </ul>
                @auth
                    <a href="{{ route('auth.logout') }}" class="btn.btn-outline btn-primary">
                        Выход
                    </a>
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

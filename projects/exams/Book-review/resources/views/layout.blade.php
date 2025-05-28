<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

</head>

<body>
    <div class="container">
        <div class="btn-group mb-2 mt-3" role="group" aria-label="Basic outlined example">
            <a href="{{route('books.index', ['option'=>'latest'])}}" class="btn btn-outline-primary"
            @if (request('option') == 'latest')
                active
            @endif>Популярные за всё время</a>
            <a href="{{route('books.index', ['option'=>'popular_1'])}}" class="btn btn-outline-primary"
                @if (request('option') == 'popular_1')
                active
                @endif>Популярные за месяц</a>
            <a href="{{route('books.index', ['option'=>'popular_6'])}}" class="btn btn-outline-primary"
                @if (request('option') == 'popular_6')
                active
                @endif>Популярные за 6 месяцев</a>
            <a href="{{route('books.index', ['option'=>'high_rating_1'])}}" class="btn btn-outline-primary"
                @if (request('option') == 'high_rating_1')
                active
                @endif>Популярные по рейтингу за месяц</a>
            <a href="{{route('books.index', ['option'=>'high_rating_6'])}}" class="btn btn-outline-primary"
                @if (request('option') == 'high_rating_6')
                active
                @endif>Популярные по рейтингу за 6 месяцев</a>
        </div>

        <form action="{{route('books.index')}}" method="get" class="mb-2">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Поиск" aria-label="Поиск книги по названию"  name="search" value="{{request('search')}}">
                <button class="btn btn-outline-secondary" type="submit">Найти</button>
                <a href="{{route('books.index')}}" class="btn btn-outline-secondary">Все книги</a>
            </div>
        </form>
        {{-- @auth
        <img src="{{asset(auth()->user()->avatar)}}" height="40px" width="40px" alt="">
        @endauth --}}
        {{-- <div class="d-flex justify-center mb-5" style="width: 100%">
            <a href="{{route('user.create')}}"  class="btn btn-primary" style="margin-right: 25px">Регистарция</a>
            <a href="{{route('user.login')}}"  class="btn btn-success">Вход</a>
        </div> --}}

        @if (session()->has('info'))
            <div class="alert alert-success fade show d-flex justify-content-between">
                <p style="margin: 0">{{session('info')}}</p>
                <button type="button" class="btn-close" data-bs-dismiss='alert'></button>
            </div>
        @endif
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

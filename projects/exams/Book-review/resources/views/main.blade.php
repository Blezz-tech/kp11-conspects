@extends('layout')

@section('content')
    @guest
        <div class="d-flex justify-center mb-5" style="width: 100%">
            <a href="{{ route('user.create') }}" class="btn btn-primary" style="margin-right: 25px">Регистарция</a>
            <a href="{{ route('user.login') }}" class="btn btn-success">Вход</a>
        </div>
    @endguest
    @auth
        <div class="d-flex mb-3">
            <a href="{{ route('user.logout') }}" class="btn btn-success">Выход</a>
            <img src="{{ asset(auth()->user()->avatar) }}" height="40px" width="40px" style="border-radius: 10px; margin-left:10px" alt="...">
        </div>
    @endauth

    <div class="container d-flex justify-content-between justify-content-between flex-wrap" style="padding: 0">
        @forelse ($books as $book)
            <div class="card mb-5" style="width: 18rem;">
                <img src="{{ asset($book->avatar) }}" class="card-img-top" alt="..." height="40%">
                <div class="card-body" style="height: max-content">
                    <h5 class=""><a href="{{ route('books.show', $book) }}"
                            style="font-size: 25px">{{ $book->title }}</a></h5>
                    <h5 class="card-title">Автор {{ $book->author }}</h5>
                    <p class="card-text">Дата добавления {{ $book->created_at }}</p>
                    <p class="card-text">Количество комментариев {{ $book->comments_count }}</p>
                    Средний рейтинг {{ $book->comments_avg_rating }} <br>
                    <x-star-rating :rating="$book->comments_avg_rating ?? 0" />
                    {{-- <a href="#" class="btn btn-primary">Перейти куда-нибудь</a> --}}
                </div>
            </div>
        @empty
            <p>По запросу книг не найдено</p>
        @endforelse
    </div>
@endsection

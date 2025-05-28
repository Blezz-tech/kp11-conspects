@extends('layout')

@section('content')
<div class="container">
    <h1 class="mb-1">Название книги: {{ $book->title }}</h1>
    <h2 class="mb-1">Автор: {{ $book->author }}</h2>
    <h3 class="mb-1">Комментарии пользователей: {{$count}}</h3>
    <h3 class="mb-1">Средний рейтинг: {{$avg_rating}}</h3>
    <x-star-rating :rating="$avg_rating ?? 0"/>
    @auth
        <div class="mb-5 mt-3"><a href="{{route('comment',['book' => $book])}}" class="btn btn-success">Оставить комментарий</a></div>
    @endauth
    @forelse ($comments as $comment)
        <div class="card mb-5">
            <div class="card-header">
                {{ $comment->review }} <br>
                {{ $comment->author }} <br>
                {{ $comment->comments_count }} <br>
                {{ $comment->comments }}
                <div class="d-flex justify-content-between align-items-center">
                    {{$comment->getTimeComment()}}

                    <img src="{{asset($comment->user->avatar)}}" height="40px" width="40px" alt="///">
                </div>
            </div>
        </div>
    @empty
        <p>Тут ничего нет</p>
    @endforelse

    {{-- <x-star-rating :rating="$"/> --}}
</div>
@endsection

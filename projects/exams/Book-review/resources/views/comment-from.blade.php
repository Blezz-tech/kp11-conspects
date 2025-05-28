@extends('layout')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
@endif
<h1>{{$book->title}}</h1>
    <form action="{{route('create-comments',['book' => $book])}}" method="POST"> {{-- $book->id --}}
        @csrf
        <div class="mb-3">
            <textarea name="review" id="" cols="30" rows="10" style="width: 100%" placeholder="Оставьте комментарий"></textarea>
            <input type="number" name="rating" id="" min="1" max="5">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection

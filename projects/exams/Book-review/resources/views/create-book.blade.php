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
<form action="{{ route('create-book-end') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="title">Название книги:</label>
        <input type="text" id="title" name="title" class="form-control mb-3">
    </div>
    <div>
        <label for="description">Автор:</label>
        <textarea id="description" name="author" class="form-control mb-3"></textarea>
    </div>
    <div>
        <label for="cover_image">Обложка:</label>
        <input type="file" id="cover_image" name="avatar" class="form-control mb-3">
    </div>
    <button type="submit" class="btn btn-success">Добавить книгу</button>
</form>
@endsection

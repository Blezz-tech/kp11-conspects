@extends('admin.layout')
@section('content')
    <div class='container'>
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <div class="mb-3">
                <label for="titleInput" class="form-label">Введите название новой категории:</label> <input type="text"
                    class="form-control" id="titleInput" aria-describedby="title" name='title'>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection

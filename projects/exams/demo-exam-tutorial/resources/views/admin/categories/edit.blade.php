@extends('admin.layout')
@section('content')
    <div class='container'>
        <p>Изменение категории {{ $category->title }}</p>
        <form method="POST" action="{{ route('categories.update', $category) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Введите новое название категории: </label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}">
            </div>
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection

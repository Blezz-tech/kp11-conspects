@extends('admin.layout')
@section('content')
    <div class='container'>
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <select class="form-select" name="category_id" id="">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="titleInput" class="form-label">Введите название:</label>
                <input type="text" class="form-control"  name='title'>
            </div>
            <div class="mb-3">
                <label for="titleInput" class="form-label">Введите модель:</label>
                <input type="text" class="form-control" id="model" name='model'>
            </div>
            <div class="mb-3">
                <label for="titleInput" class="form-label">Введите цену:</label>
                <input type="number" class="form-control"  name='price'>
            </div>
            <div class="mb-3">
                <label for="titleInput" class="form-label">Введите cтрану производства:</label>
                <input type="text" class="form-control"  name='country'>
            </div>
            <div class="mb-3">
                <label for="titleInput" class="form-label">Введите год:</label>
                <input type="number" class="form-control"  name='year'>
            </div>
            <div class="mb-3">
                <label for="titleInput" class="form-label">Загрузите картину:</label>
                <input type="file" class="form-control"  name='img'>
            </div>
            <div class="mb-3">
                <label for="titleInput" class="form-label">Введите количество:</label>
                <input type="number" class="form-control"  name='qty'>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>

    </div>
@endsection

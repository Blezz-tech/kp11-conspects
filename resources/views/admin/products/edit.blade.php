@extends('admin.layout')
@section('content')
    <div class='container'>
        <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Изменить категорию:</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}"@if($category->id == $product->category_id)selected @endif>{{$category->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="titleInput" class="form-label">Измените название:</label>
                <input type="text" class="form-control" id="title" aria-describedby="title" name='title' value="{{$product->title}}">
            </div>
            <div class="mb-3">
                <label for="titleInput" class="form-label">Измените модель:</label>
                <input type="text" class="form-control"   name='model' value="{{$product->model}}">
            </div>
            <div class="mb-3">
                <label for="titleInput" class="form-label">Измените цену:</label>
                <input type="number" class="form-control"  name='price' value="{{$product->price}}">
            </div>
            <div class="mb-3">
                <label for="titleInput" class="form-label">Измените cтрану производства:</label>
                <input type="text" class="form-control"  name='country' value="{{$product->country}}">
            </div>
            <div class="mb-3">
                <label for="titleInput" class="form-label">Измените год:</label>
                <input type="number" class="form-control"  name='year' value="{{$product->year}}">
            </div>
            <div class="mb-3">
                <label for="titleInput" class="form-label">Измените картину:</label>
                <input type="file" class="form-control"  name='img_path' value="{{$product->img_path}}">
            </div>
            <div class="mb-3">
                <label for="titleInput" class="form-label">Измените количество:</label>
                <input type="number" class="form-control"  name='qty' value="{{$product->qty}}">
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection


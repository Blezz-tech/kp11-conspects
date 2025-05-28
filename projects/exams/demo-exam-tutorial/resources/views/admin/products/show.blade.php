@extends('admin.layout')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card" style="width: 35%">
            <div class="card-body">
                <img src="{{ asset($product->img_path) }}" class="card-img-top" width="150px" height="250px" alt="Картинка рояля">
                <h5 class="card-title">{{ $product->title }}</h5>
                <p class="card-text">Стоимость: {{ $product->price }} ₽</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Год производства: {{ $product->year }}</li>
                <li class="list-group-item">Модель: {{ $product->model }}</li>
                <li class="list-group-item">Страна: {{ $product->country }}</li>
            </ul>
            <div class="card-body d-flex justify-content-between">
                <a href="{{route('products.edit', $product)}}" class="btn btn-primary">Изменить</a>

                <form action="{{route('products.destroy', $product)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">
                        Удалить
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

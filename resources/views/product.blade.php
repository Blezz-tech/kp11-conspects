@extends('layouts.layout')

@section('content')
    <div class="card w-60">
        <div class="card-body">
            <img src="{{ asset($product->img_path) }}" class="card-img-top w-60" alt="Картинка рояля">
            <h5 class="card-title">{{ $product->title }}</h5>
            <p class="card-text">Стоимость: {{ $product->price }} ₽</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Год производства: {{ $product->year }}</li>
            <li class="list-group-item">Модель: {{ $product->model }}</li>
            <li class="list-group-item">Страна: {{ $product->country }}</li>
        </ul>
        <div class="card-body">
            @auth
                <a href="#" class="btn btn-primary">В коризну</a>
            @endauth

            @guest
            <a href="{{}}" class="btn btn-primary">зарегистрироавться и купить</a>
            @endguest
        </div>
    </div>
@endsection

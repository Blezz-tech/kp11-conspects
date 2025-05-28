@extends('layouts.layout')

@section('content')
    <form action="{{ route('catalog.filter') }}" method="POST">
        @csrf
        <div class="d-flex justify-content-between mb-3 gap-3">
            <select name="filter" class="form-select">
                <option value="0">Все категории</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <select name="sort" class="form-select">
                <option value="title">По алфавиту</option>
                <option value="price">Сначала дешевые</option>
                <option value="created_at">Сначала новые</option>
            </select>
            <button class="btn btn-primary" type="submit">Применить</button>
        </div>
    </form>
    {{-- <div class="row"> --}}
    <div class="d-flex flex-wrap gap-4 justify-content-center">
        @foreach ($products as $product)
            <div class="card mb-5" style="width: 18rem;">
                <img src="{{ asset($product->img_path) }}" class="card-img-top" alt="" height="250px">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">{{ $product->price }} ₽</p>
                    <a href="{{ route('product.show', ['id' => $product->id]) }}" class="btn btn-primary">
                        Описание товара
                    </a>
                    @auth
                        <a href="{{route('cart.add', ['id' => $product->id])}}" class="mt-3 btn btn-primary">
                            В корзину
                        </a>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
    {{-- </div> --}}
@endsection

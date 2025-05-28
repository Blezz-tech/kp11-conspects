@extends('admin.layout')

@section('content')
    <h1 class="text-center">Каталог</h1>
    <div class="d-flex justify-content-between mb-5" >
        <form action="{{ route('admin.products.filter') }}" method="POST" style="width:75%;">
            @csrf
            <div class="d-flex gap-3">
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
        <a href="{{route('products.create')}}" class="btn btn-primary">Добавить новый товар</a>
    </div>
    <div class="container d-flex flex-wrap" style="gap: 30px">
        @foreach ($products as $product)

                <div class="card mb-5" style="width: 18rem;" >
                    <img src="{{asset($product->img_path) }}" class="card-img-top" height="200px" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">{{ $product->price }} ₽</p>
                        <a href="{{ route('product.show', $product) }}" class="btn btn-info w-100 mb-3 text-white">
                            Посмотреть продукт
                        </a>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">
                                Изменить
                            </a>
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

        @endforeach
    </div>

@endsection

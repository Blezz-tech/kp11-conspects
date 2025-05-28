@extends('layouts.layout')

@section('content')
    <div id="carouselExampleCaptions" class="carousel carousel-dark slide m-auto" style="width: 640px;">
        <div class="carousel-indicators">
            @foreach ($products as $i => $product)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $i }}"
                    aria-current="true" aria-label="Слайд 1" @class([
                        'active' => $i == 0,
                    ])>
                </button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($products as $i => $product)
                <div @class(['carousel-item', 'active' => $i == 0])>
                    <img src="{{ asset($product->img_path) }}" class="d-block" style="width: 640px; height:480px;"
                        alt="Картинка 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{$product->title}}</h5>
                        <p>{{$product->price}}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Предыдущий слайд</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Следующий слайд</span>
        </button>
    </div>
@endsection

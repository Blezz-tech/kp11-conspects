@extends('layouts.layout')

@section('content')

<h2>Выбранные товары</h2>

@if($products != null) 

<table class="table table-striped mt-5">
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>
                    {{$product->title}}
                </td>
                <td>
                    {{$product->price}} рублей за 1 товар
                </td>
                <td>
                    <form id="product-form" action="{{route('cart.change', $product)}}" method="post">
                        @csrf
                        <input type="btn btn-primary" name="qty" value="{{$product->pivot->qty}}" min="0"
                            max="{{$product->qty}}">
                        <div class="form-text small">В наличии {{$product->qty}}</div>
                    </form>
                </td>
                <td>
                    <button form="product-form" class="btn btn-primary" type="submit">Изменить</button>
                </td>
                <td>
                    <a href="{{route('cart.delete', $product->id)}}" class="btn btn-primary">Удалить</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Заказать
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Введите пароль для подтверждения заказа</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('orders.send')}}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="password" name="password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary">Заказать</button>
                </div>
            </form>
        </div>
    </div>
</div>

@else

<p>Корзина пуста</p>

@endif

@endsection

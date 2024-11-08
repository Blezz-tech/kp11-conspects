@extends('layouts.layout')

@section('content')

<h2>Выбранные товары</h2>

<table class="table table -stripped mt-5">
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

@endsection

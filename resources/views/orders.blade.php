@extends('layout')

@section('content')

<h1>Заказы</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Дата</th>
            <th scope="col">Стутус</th>
            <th scope="col">Состав заказа</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <th scope="row">{{ $order->created_at }}</th>
            <td>{{ $order->status }}
                @if ($order->status == 'Новый')
                    <a href="{{route('orders.destroy', $order)}}" class="btn btn-primary">Удалить</a>
                @endif
            </td>
            <td>
                @foreach ($order->products as $product)
                <p>{{ $product->title. ' '. $product->price. ' руб. '. $product->pivot->qty. ' шт.'}}</p>

                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@extends('layouts.adminlayout')

@section('title')
    Заявки
@endsection

@section('content')
    <table class="mt-5 table table-striped">
        <thead>
            <tr>
                <th scope="col">ФИО</th>
                <th scope="col">Почта заявителя</th>
                <th scope="col">Адрес</th>
                <th scope="col">Дата</th>
                <th scope="col">Время</th>
                <th scope="col">Тип оплаты</th>
                <th scope="col">Статус</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{ $order->created_at }}</th>
                    <td>{{ $order->status }}
                        @if ($order->status == 'Новый')
                            <a href="{{ route('orders.destroy', $order) }}" class="btn btn-primary">Удалить</a>
                        @endif
                    </td>
                    <td>
                        @foreach ($order->products as $product)
                            <p>{{ $product->title . ' ' . $product->price . ' руб. ' . $product->pivot->qty . ' шт.' }}</p>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@extends('layouts.layout')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Цена</th>
                <th scope="col">Кол-во</th>
                <th scope="col">Итого</th>
                <th scope="col">Адрес</th>
                <th scope="col">Статус</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $key => $order)
                <tr>
                    <th>{{ $key }}</th>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->product->price }}</td>
                    <td>{{ $order->count }}</td>
                    <td>{{ $order->count * $order->product->price }}</td>
                    <td>{{ $order->address }}</td>
                    <td>
                        @if ($order->status == -1)
                            Отказано
                        @elseif ($order->status == 0)
                            На рассмотрении
                        @else
                            Принято
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">
                        <div class="alert alert-danger text-center" role="alert">
                            Нет сведений о ваших заказах
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <p class="text-center">
        <a class="link-opacity-100-hover" href="{{ route('user.orders.create') }}">Создать заказ</a>
    </p>
@endsection

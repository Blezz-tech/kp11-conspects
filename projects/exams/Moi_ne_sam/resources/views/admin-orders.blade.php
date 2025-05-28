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
                    <td scope="row">{{ $order->user->name }}</td>
                    <td scope="row">{{ $order->email }}</td>
                    <td scope="row">{{ $order->address }}</td>
                    <td scope="row">{{ $order->date }}</td>
                    <td scope="row">{{ $order->time }}</td>
                    <td scope="row">{{ $order->payment_type }}</td>
                    <td scope="row">{{ $order->status }}</td>

                    <td>
                        @if ($order->status == 'new')
                            <a href="{{route('admin_status', $order)}}" class="btn btn-primary">Сменить статус</a>
                        @elseif ($order->status != 'new')
                            <button disabled href="#" class="btn btn-danger">Disabled</button>
                        @endif
                    </td>

                    {{-- <td>{{ $order->status }}
                        @if ($order->status == 'new')
                            <a href="{{ route('orders.destroy', $order) }}" class="btn btn-primary">Сменить статус</a>
                        @endif
                    </td> --}}
                    {{-- <td>
                        @foreach ($order->products as $product)
                            <p>{{ $product->title . ' ' . $product->price . ' руб. ' . $product->pivot->qty . ' шт.' }}</p>
                        @endforeach
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

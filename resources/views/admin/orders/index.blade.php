@extends('admin.layout')


@section('content')


<table class="table table-striped mt-5">
    <thead>
        <tr>
            <th scope="col">Дата</th>
            <th scope="col">ФИО</th>
            <th scope="col">Кол-во</th>
            <th scope="col">Статус</th>
            <th scope="col">Отмена</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td scope="row">{{ $order->created_at }}</td>
                <td>{{ $order->user->surname . ' ' . $order->user->name . ' ' . $order->user->patronymic }}</td>
                <td>{{ $order->products_count }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    @if ($order->status === 'отменен')
                        Причина отмены: {{ $order->coment }}
                    @else
                        Нет комментария
                    @endif
                </td>
                <td>
                    {{Sorder->status}}
                    @if($order->status == 'новый')
                        <a href="{{route('admin.orders.confirm', $order)}}" class="btn btn-primary">
                            Подтвердить заказ
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection

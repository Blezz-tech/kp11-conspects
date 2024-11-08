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
                Причина отмены: {{ $order->comment }}
            @else
                Нет комментария
            @endif
        </td>
    </tr>
@endforeach
</tbody>
</table>


<!-- <a href="{{route('orders.create')}}" class="btn btn-primary" role="button">Добавить новую категорию</a> -->

@endsection

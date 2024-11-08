@extends('admin.layout')


@section('content')


<form action="{{ route('admin.orders.index') }}" method="GET">
    @csrf
    <div class="d-flex justify-content-between mb-3 gap-3">
        <select name="status" class="form-select">
            <option value="нет">Все категории</option>
            <option value="новый">новый</option>
            <option value="подтвержден">подтвержден</option>
            <option value="в корзине">в корзине</option>
            <option value="отменен">отменен</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Применить</button>
</form>

<table class="table table-striped mt-5">
    <thead>
        <tr>
            <th scope="col">Дата</th>
            <th scope="col">ФИО</th>
            <th scope="col">Кол-во</th>
            <th scope="col">Статус</th>
            <th scope="col">Действие</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td scope="row">{{ $order->created_at }}</td>
                <td>{{ $order->user->surname . ' ' . $order->user->name . ' ' . $order->user->patronymic }}</td>
                <td>{{ $order->products_count }}</td>
                <td>
                    {{ $order->status }}
                    @if($order->status == 'новый')
                        <a href="{{route('admin.orders.confirm', $order)}}" class="btn btn-primary mt-3">
                            Подтвердить заказ
                        </a>
                    @endif
                </td>
                <td>
                    @if ($order->status === 'отменен')
                        @if ($order->coment == NULL)
                            Нет комментария
                        @else
                            Причина отмены: {{ $order->coment }}
                        @endif
                    @endif

                    @if ($order->status === 'новый')
                        <form method="POST" action="{{route('admin.orders.cancel', $order)}}">
                            @csrf
                            <input typ="text" name="coment" value="комментарий">
                            <button type='submit' class='btn btn-primary mt-3'>
                                Отменить заказ
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection

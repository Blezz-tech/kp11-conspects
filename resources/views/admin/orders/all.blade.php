@extends('admin.adminlayout')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Покупатель</th>
                <th scope="col">Наименование</th>
                <th scope="col">Цена</th>
                <th scope="col">Кол-во</th>
                <th scope="col">Итого</th>
                <th scope="col">Адрес</th>
                <th scope="col">Статус</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $key => $order)
                <tr>
                    <th>{{ $key }}</th>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->product->price }}</td>
                    <td>{{ $order->count }}</td>
                    <td>{{ $order->count * $order->product->price }}</td>
                    <td>{{ $order->address }}</td>
                    <td>
                        @if ($ticket->status == 1)
                            Принято
                        @elseif ($ticket->status == -1)
                            Отказано
                        @else
                            <form action="{{ route('admin.orders.changestatus') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $order->id }}">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status"
                                        id="success-{{ $key }}" value="1" checked>
                                    <label class="form-check-label" for="success-{{ $key }}">Принять</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status"
                                        id="dismiss-{{ $key }}" value="-1">
                                    <label class="form-check-label" for="dismiss-{{ $key }}">Отклонить</label>
                                </div>
                                <input type="submit" value="Применить" class="btn btn-primary">
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        <div class="alert alert-danger" role="alert">
                            Нет сведений о ваших записях
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

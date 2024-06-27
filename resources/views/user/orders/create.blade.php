@extends('layouts.layout')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Цена</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $key => $product)
                <tr>
                    <th>{{ $key }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <form method="POST" action="{{ route('user.orders.store') }}">
                            <div class="d-flex gap-3">
                                @csrf
                                <input class="form-control" type="text" name="product_id" value="{{ $product->id }}" hidden required>
                                <input class="form-control" type="text" name="address" placeholder="Адрес" required>
                                <input class="form-control" type="number" name="count" placeholder="Количество" required>
                                <button type="submit" class="btn btn-primary">Заказать</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        <div class="alert alert-danger text-center" role="alert">
                            Нет сведений о продуктах
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

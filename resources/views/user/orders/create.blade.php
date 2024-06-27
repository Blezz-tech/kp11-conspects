@extends('layouts.layout')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Цена</th>
                <th scope="col">Адрес</th>
                <th scope="col">Кол-во</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $key => $product)
                <tr>
                    <th>{{ $key }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <form method="POST" action="{{ route('user.orders.store') }}">
                        <input type="text" name="product_id" value="{{$product->id}}" hidden required>
                        <td>
                            <input class="form-control" type="text" name="address" id="" required>
                        </td>
                        <td>
                            <input class="form-control" type="number" name="count" id="" required>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary">Заказать</button>
                        </td>
                    </form>
                </tr>
            @empty
                <tr>
                    <td colspan="7">
                        <div class="alert alert-danger text-center" role="alert">
                            Нет сведений о продуктах
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{-- <form class="mt-4" method="POST" action="{{ route('products.store') }}">
        @csrf
        <div class="mb-3">
            <select class="form-select" name="product_id" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="count" class="form-label">Количество</label>
            <input type="text" class="form-control" id="count" name="count" value="1" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Стоимость</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Создать товар</button>
    </form> --}}
@endsection

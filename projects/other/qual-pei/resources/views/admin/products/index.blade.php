@extends('layouts.layout')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Цена</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $key => $product)
                <tr>
                    <th>{{$key}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">
                        <div class="alert alert-danger text-center" role="alert">
                            Нет сведений о ваших записях
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

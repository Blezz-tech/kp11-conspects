@extends('layouts.layout')
@section('content')
    <form class="mt-4" method="POST" action="{{ route('products.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Наименование</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Стоимость</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Создать товар</button>
    </form>
@endsection

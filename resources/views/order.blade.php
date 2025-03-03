@extends('layouts.layout')

@section('title')
    Создание Заявки
@endsection

@section('content')
    <div class='container w-50'>
        <h1 class="mt-5">Введите данные регистрации</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{route('order_store')}}">
            @csrf
            <div class="mb-3">
                <label for="address" class="form-label">Укажите свой адрес</label>
                <input name="address" type="string" class="form-control" id="address" aria-describedby="address">
            </div>

            <div class="mb-3">
                <label for="date_type" class="form-label">Укажите удобную для Вас дату</label>
                <input name="date" type="date" class="form-control" id="date_type" aria-describedby="date_type">
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Укажите удобноое для Вас время</label>
                <input name="time" type="time" class="form-control" id="time" aria-describedby="time">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Укажите свою почту</label>
                <input name="email" type="email" class="form-control" id="email" aria-describedby="email">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Выберете удобный способ оплаты</label>
                <select name="payment_type" id="">
                    <option value="cash">Наличными</option>
                    <option value="card">По карте</option>
                </select>
            </div>

            <select name="filter" class="form-select">
                <option value="0">Все Услуги</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary mt-5">Оставить заявку</button>
        </form>
    </div>
@endsection

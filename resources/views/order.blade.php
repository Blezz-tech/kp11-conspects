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
        <form method="post" action="{{ route('registration_store') }}">
            @csrf
            <div class="mb-3">
                <label for="address" class="form-label">Укажите свой адрес</label>
                <input name="address" type="string" class="form-control" id="address" aria-describedby="address">
            </div>

            <div class="mb-3">
                <label for="date_type" class="form-label">Укажите удобную для Вас дату</label>
                <input name="date" type="string" class="form-control" id="date_type" aria-describedby="date_type">
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Укажите удобноое для Вас время</label>
                <input name="time" type="string" class="form-control" id="time" aria-describedby="time">
            </div>
                {{-- <select name="filter" class="form-select">
                    <option value="0">Все Услуги</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select> --}}
            <button type="submit" class="btn btn-primary">Оставить заявку</button>
        </form>
    </div>
@endsection

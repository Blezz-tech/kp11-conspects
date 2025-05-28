@extends('layouts.layout')

@section('content')
    <div class='container w-50'>
        <h1>Введите данные регистрации</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('auth.store') }}">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Имя</label>
              <input name="name" type="string" class="form-control" id="name" aria-describedby="name">
            </div>
            <div class="mb-3">
              <label for="surname" class="form-label">Фамилия</label>
              <input name="surname" type="string" class="form-control" id="surname" aria-describedby="surname">
            </div>
            <div class="mb-3">
              <label for="patronymic" class="form-label">Отчество</label>
              <input name="patronymic" type="string" class="form-control" id="patronymic" aria-describedby="patronymic">
            </div>
            <div class="mb-3">
              <label for="login" class="form-label">Логин</label>
              <input name="login" type="string" class="form-control" id="login" aria-describedby="login">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input name="email" type="email" class="form-control" id="email" aria-describedby="email">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Пароль</label>
              <input name="password" type="password" class="form-control" id="password">
            </div>
            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Повторите пароль</label>
              <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
            </div>
            <div class="mb-3 form-check">
              <input name="" type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Согласен на всё</label>
            </div>
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>
    </div>
@endsection

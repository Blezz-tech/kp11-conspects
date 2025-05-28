@extends('layouts.layout')

@section('title')
    Регистрация
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
        <form  method="post" action="{{route('registration_store')}}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">ФИО</label>
                <input name="name" type="string" class="form-control" id="name" aria-describedby="name">
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
                <label for="phone" class="form-label">Телефон в формате +7(XXX)-XXX-XX-XX</label>
                <input name="phone" type="string" class="form-control" id="phone" aria-describedby="phone">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input name="password" type="password" class="form-control" id="password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Повторите пароль</label>
                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
            </div>
            {{-- <div class="mb-3 form-check">
                <input name="agreement" type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Согласен на всё</label>
            </div> --}}
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>
    </div>
@endsection

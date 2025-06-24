@extends('layouts.layout')
@section('content')
    <form class="mt-4" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="login" class="form-label">Логин</label>
            <input type="text" class="form-control" id="login" name="login">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection

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
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Пароль</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
              <input type="password" class="form-control" id="exampleInputPassword2">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Согласен на всё</label>
            </div>
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>
    </div>
@endsection

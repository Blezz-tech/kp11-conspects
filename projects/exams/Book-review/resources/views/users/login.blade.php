@extends('layout')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
@endif

<form action="{{route('user.login_store')}}" method="POST">
    @csrf
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Логин</label>
        <input type="text" name="name" class="form-control">
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Пароль</label>
        <input type="password" name="password" class="form-control">
      </div>

    <button type="submit" class="btn btn-primary">Отправить</button>
  </form>
@endsection

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

<form action="{{route('user.store')}}" method="POST" class="mt-5" enctype="multipart/form-data">
@csrf
<input type="name" name="name" id="" class="form-control mb-5" placeholder="name">
<input type="email" name="email" id="" class="form-control mb-3" placeholder="email">
<input type="password" name="password" id="" class="form-control mb-3" placeholder="password">
    <label for="avatar"class="form-label">Загрузите свою фотку чилловую</label>
    <input type="file" class="form-control" id="avatar" name="avatar">
<button type="submit" class="btn btn-secondary mt-3">Зарегаться</button>
</form>
@endsection

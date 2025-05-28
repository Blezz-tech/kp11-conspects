@extends('layouts.adminlayout')

@section('title')
    Смена статуса
@endsection

@section('content')
    <div class='container w-50'>
        <h1 class="mt-5">Измените статус заявки</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{route('admin_status_store',  $order)}} ">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label class="form-label">Выберете статус заявки</label>
                <select name="payment_type" class="form-select">
                    <option value="0">Статусы</option>
                    <option value="in_process">В работе</option>
                    <option value="confirmed">Выполнено</option>
                    <option value="cancelled">Отменено</option>
                </select>
            </div>
            <div class="mt-3">
                <label class="form-label">Напишите комментарий, если выбрали статус отказ</label>
                <input type="text" name="rejection_reason" value=" ">
            </div>
            <button type="submit" class="btn btn-primary mt-5">Смениить статус</button>
        </form>
    </div>
@endsection

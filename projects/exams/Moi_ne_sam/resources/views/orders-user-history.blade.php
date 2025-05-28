@extends('layouts.layout')

@section('title')
    Ваши заявки
@endsection

@section('content')
    <div class="d-flex gap-4 flex-wrap mt-5">
        @foreach ($applications as $application)
            <div class="card" style="width: 18rem;">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h5 class="card-title"><strong>{{ $application->created_at }}</strong></h5>
                    <p class="card-text">{{ $application->address }}</p>
                    <p class="card-text">Дата: {{ $application->date }}</p>
                    <p class="card-text">Время: {{ $application->time }}</p>
                    <p class="card-text">Почта: {{ $application->email }}</p>
                    <p class="card-text">Оплата: {{ $application->payment_type }}</p>
                    <p class="card-text">Решение: {{ $application->status }}</p>
                    @if ($application->rejection_reason)
                    <p class="card-text">Комментарий отказа:{{$application->rejection_reason}}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection

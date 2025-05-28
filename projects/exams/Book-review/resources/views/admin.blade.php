@extends('layout')

{{-- @section('title')
    Админка
@endsection --}}

@section('content')

    <a href="{{route('create-book')}}" class="btn btn-outline-secondary">Добавить книгу</a>

    <div class="">
        <div>
            <a href="{{route('user.logout')}}" class="btn btn-success mt-3">Выход</a>
        </div>
        @forelse ($comments as $comment)

        <div class="card mt-5">
            <div class="card border-success mb-3">
                <div class="card-header border-success">
                    <b class="text-success">{{ $comment->user->name }} оставил(а) комментарий</b>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Комментарий</h5>
                <p class="card-text">{{ $comment->review }}</p>
            </div>
            <div style="padding: 0 0 30px 17px">
                @if ($comment->status == 0)
                    <form action="{{ route('changedata') }}" method="POST">
                        @csrf
                        <div class="form-check">
                            <input type="hidden" name="id" value="{{ $comment->id }}">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1"
                                value="1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                принять заявку
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2"
                                value="-1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Отклонить заявку
                            </label>
                        </div>

                        <button type="submit">Отправить</button>
                    </form>
                @elseif ($comment->status == 1)
                    <p>Комментарий одобрен</p>
                @else
                    <p>Комментарий отклонён</p>
                @endif
            </div>
        </div>

    @empty
@endforelse
    </div>
@endsection

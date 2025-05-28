<x-layout>
    <h1>Отклонение заявки</h1>
    <div class="row">
        <div class="col-xl-4">
            <img class="d-block m-auto" style="max-width: 300px; height: 225px;" src="{{ asset($ticket->photo_before)}} " alt="">
        </div>
        <div class="col-xl-8">
            <h3>{{$ticket->title}}</h3>
            <p>Описание: {{$ticket->description}}</p>
            <p>Категория: <strong>{{$ticket->category->name}}</strong></p>
            <p>Дата Создания: {{$ticket->created_at}}</p>
        </div>
    </div>
    <form method="POST" action="{{ route('admin.tickets.reject', $ticket) }}">
        @csrf
        <div class="mb-3">
            <label for="comment" class="form-label">Причина отказа</label>
            <textarea
                name="comment"
                @class([
                    "form-control" => true,
                    "is-invalid" => $errors->has('comment'),
                ])
                id="comment"
                rows="3"
                aria-describedby="commentHelp"
            ></textarea>
            @error('comment')
                <div id="commentHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-danger">Отклонить</button>
        <a class="btn btn-primary" href="{{ route('admin.tickets.index') }}" role="button">Назад</a>
    </form>
</x-layout>

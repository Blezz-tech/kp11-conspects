<x-layout>
    <h1>Решение заявки</h1>
    <div class="row">
        <div class="col-xl-4">
            <img class="d-block m-auto" style="max-width: 300px; height: 225px;" src="{{ asset($ticket->photo_after)}} " alt="">
        </div>
        <div class="col-xl-8">
            <h3>{{$ticket->title}}</h3>
            <p>Описание: {{$ticket->description}}</p>
            <p>Категория: <strong>{{$ticket->category->name}}</strong></p>
            <p>Дата Создания: {{$ticket->created_at}}</p>
        </div>
    </div>
    <form method="POST" action="{{ route('admin.tickets.accept', $ticket) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="photo_after" class="form-label">Файл заявки</label>
            <input
                name="photo_after"
                @class([
                    "form-control" => true,
                    "is-invalid" => $errors->has('photo_after'),
                ])
                type="file"
                aria-describedby="photoAfterHelp"
                id="photo_after"
                accept=".jpg,.jpeg,.png,.bmp">
            @error('photo_after')
                <div id="photoAfterHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-danger">Принять</button>
        <a class="btn btn-primary" href="{{ route('admin.tickets.index') }}" role="button">Назад</a>
    </form>
</x-layout>

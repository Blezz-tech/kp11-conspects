<x-layout>
    {{-- TODO: Сделать верстку админки --}}

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Время</th>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Категория</th>
            <th scope="col">Статус</th>
            <th scope="col">До</th>
            <th scope="col">После</th>
            <th scope="col">Коммент</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <th scope="row">{{ $ticket->id }}</th>
                    <td>{{ $ticket->fmt_created_at }}</td>
                    <td>{{ $ticket->title }}</td>
                    <td>{{ $ticket->description }}</td>
                    <td>{{ $ticket->category->name }}</td>
                    <td>{{ $ticket->state->name }}</td>
                    <td>
                        <img style="max-width: 100px; height: auto;" src="{{ asset($ticket->photo_before) }}" alt="Photo Before" />
                    </td>
                    @if ($ticket->photo_after != null)
                        <td>
                            <img style="max-width: 100px; height: auto;" src="{{ asset($ticket->photo_after) }}" alt="Photo Before" />
                        </td>
                    @else
                        <td>-</td>
                    @endif
                    <td>{{ $ticket->comment }}</td>
                    <td>
                        {{-- TODO: Сделать кнопки с ссылками на страницы:
                            1. Подтвердить
                            2. Удалить
                        --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>

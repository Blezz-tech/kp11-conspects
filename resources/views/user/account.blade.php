<x-layout>
    {{-- TODO: Сделать верстку ЛК --}}
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
                    <td>{{ $ticket->created_at }}</td>
                    <td>{{ $ticket->s_title }}</td>
                    <td>{{ $ticket->s_description }}</td>
                    <td>{{ $ticket->category->name }}</td>
                    <td>
                        <div @class([
                            'text-center' => true,
                            'alert' => true,
                            'alert-primary' => $ticket->state->id == 1,
                            'alert-success' => $ticket->state->id == 2,
                            'alert-danger' => $ticket->state->id == 3,
                        ]) role="alert">
                            {{ $ticket->state->name }}
                        </div>
                    <td>
                        <img style="max-width: 100px; height: 75px;" src="{{ asset($ticket->photo_before) }}" alt="Photo Before" />
                    </td>
                    @if ($ticket->photo_after != null)
                        <td>
                            <img style="max-width: 100px; height: 75px;" src="{{ asset($ticket->photo_after) }}" alt="Photo Before" />
                        </td>
                    @else
                        <td>-</td>
                    @endif
                    <td>{{ $ticket->s_comment }}</td>
                    <td>
                        @if ($ticket->state->id == 1)
                            <a class="btn btn-outline-danger" href="{{ route('user.ticket.deletePage', $ticket) }}" role="button">Удалить</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>

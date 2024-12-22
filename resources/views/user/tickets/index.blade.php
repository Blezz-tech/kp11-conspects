<x-layout-errors>
    <form action="{{ route('user.tickets.index') }}" method="GET">
        @csrf
        <div class="mb-3">
            <select name="state_id" class="form-select" aria-label="Default select example">
                <option value="" selected>все</option>
                @foreach ($states as $state)
                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Фильтровать</button>
    </form>
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
                    <td>
                        @if ($ticket->photo_after != null)
                            <img style="max-width: 100px; height: 75px;" src="{{ asset($ticket->photo_after) }}" alt="Photo Before" />
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $ticket->s_comment }}</td>
                    <td>
                        @if ($ticket->state->id == 1)
                            <a class="btn btn-outline-danger" href="{{ route('user.ticket.destroyPage', $ticket) }}" role="button">Удалить</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout-errors>

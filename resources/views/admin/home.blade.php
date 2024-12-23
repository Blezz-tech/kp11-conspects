<x-layout>
    <form action="{{ route('admin.home') }}" method="GET">
        @csrf
        <div class="mb-3">
            <select name="state_id" class="form-select">
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
            <th scope="col">Описание</th>
            <th scope="col">Категория</th>
            <th scope="col">Оплата</th>
            <th scope="col">Статус</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <th scope="row">{{ $ticket->id }}</th>
                    <td>{{ $ticket->created_at }}</td>
                    <td>{{ $ticket->comment }}</td>
                    <td>{{ $ticket->category->name }}</td>
                    <td>{{ $ticket->is_nalink ? 'Налик' : 'Картой' }}</td>
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
                    </td>
                    <td>
                        @if ($ticket->state->id == 1)
                            <div class="d-flex flex-column gap-1">
                                {{-- <a class="btn btn-outline-primary" href="{{ route('admin.tickets.accept', $ticket) }}" role="button">Принять</a>
                                <a class="btn btn-outline-danger" href="{{ route('admin.tickets.reject', $ticket) }}" role="button">Отклонить</a> --}}
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>

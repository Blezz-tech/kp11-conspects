<x-layout>
    <form action="{{ route('user.home') }}" method="GET">
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
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Создать заявку
        </button>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Время создания</th>
            <th scope="col">Время получения</th>
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
                    <td>{{ $ticket->date_get }}</td>
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
                                <form method="POST" action="{{ route('user.tickets.destroy', $ticket) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">Удалить</button>
                                </form>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Создание заявки</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="create-ticket-form" action="{{ route('user.tickets.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="comment" class="form-label">Описание</label>
                    <input name="comment" class="form-control" id="comment" rows="3" ></input>
                </div>
                <div class="mb-3">
                    <label for="date_get" class="form-label">Дата получения услуги</label>
                    <input name="date_get" type="date" class="form-control" id="date_get" ></input>
                </div>
                <div class="mb-3">
                    <label for="time_get" class="form-label">Время получения услуги</label>
                    <input name="time_get" type="time" class="form-control" id="time_get" ></input>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Категория</label>
                    <select name="category_id" class="form-control" aria-label="category_id" id="category_id">
                        <option></option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 form-check form-switch">
                    <input name="is_nalik" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">вкл - наликом / выкл - наличкой</label>
                </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            <button form="create-ticket-form" type="submit" class="btn btn-primary">Создать</button>
          </div>
        </div>
      </div>
    </div>
</x-layout>

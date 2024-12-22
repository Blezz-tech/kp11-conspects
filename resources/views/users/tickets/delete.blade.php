<x-layout>
    <h1>Вы уверены, что хотите удалить данную заявку?</h1>
    <div class="d-flex flex-row justify-content-evenly">
        <form method="POST" action="{{ route('user.tickets.delete', $ticket)}}">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Да</button>
        </form>
        <a class="btn btn-outline-primary" role="button" href={{ route('user.account') }} >Вернуться</a>
    </div>
</x-layout>

<x-layout>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Active</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
    </ul>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('user.tickets.index') }}">Личный кабинет</a>
    </li>
</x-layout>

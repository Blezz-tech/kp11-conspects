<x-layout>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="login" class="form-label">Почта</label>
            <input name="login" type="login" class="form-control" id="login">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
</x-layout>

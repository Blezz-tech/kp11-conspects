<x-layout>
    <form action="{{ route('auth.login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="login" class="form-label">Логин</label>
            <input name="login" type="login" class="form-control" id="login" aria-describedby="loginHelp" >
            <div id="loginHelp" class="form-text">We'll never share your email with anyone else.</div>
            {{-- TODO: Сделать подсветку ошибочных полей --}}
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="passwordHelp">
            <div id="passwordHelp" class="form-text">We'll never share your email with anyone else.</div>
            {{-- TODO: Сделать подсветку ошибочных полей --}}
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
</x-layout>

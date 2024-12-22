<x-layout>
    <form action="{{ route('auth.login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="login" class="form-label">Логин</label>
            <input
                name="login"
                type="login"
                @class([
                    "form-control" => true,
                    "is-invalid" => $errors->has('login'),
                ])
                id="login"
                aria-describedby="loginHelp">
            @error('login')
                <div id="loginHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input
                name="password"
                type="password"
                @class([
                    "form-control" => true,
                    "is-invalid" => $errors->has('password'),
                ])
                id="password"
                aria-describedby="passwordHelp">
            @error('password')
                <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
</x-layout>

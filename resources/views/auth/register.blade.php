<x-layout>
    <form action="{{ route('register') }}" method="POST">
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
            <label for="name" class="form-label">Имя</label>
            <input
                name="name"
                type="name"
                @class([
                    "form-control" => true,
                    "is-invalid" => $errors->has('name'),
                ])
                id="name"
                aria-describedby="nameHelp">
            @error('name')
                <div id="nameHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Почта</label>
            <input
                name="email"
                type="email"
                @class([
                    "form-control" => true,
                    "is-invalid" => $errors->has('email'),
                ])
                id="email"
                aria-describedby="emailHelp">
            @error('email')
                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
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
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Повтор пароля</label>
            <input
                name="password_confirmation"
                type="password"
                @class([
                    "form-control" => true,
                    "is-invalid" => $errors->has('password_confirmation'),
                ])
                id="password_confirmation"
                aria-describedby="passwordConfirmationHelp">
                @error('password_confirmation')
                    <div id="passwordConfirmationHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror
        </div>
        <div class="mb-3 form-check">
            <input
                name="is_accept"
                type="checkbox"
                @class([
                    "is_accept" => true,
                    "is-invalid" => $errors->has('is_accept'),
                ])
                id="is_accept"
                aria-describedby="isAcceptHelp">
            <label class="form-check-label" for="is_accept">Согласен на обработку персональных данных</label>
            @error('is_accept')
                <div id="isAcceptHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Регистрация</button>
      </form>
</x-layout>




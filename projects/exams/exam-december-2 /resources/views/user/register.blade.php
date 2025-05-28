<x-layout>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="login" class="form-label">Логин</label>
            <input name="login" type="login" class="form-control" id="login">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input name="name" type="name" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Телефон</label>
            <input name="phone" type="phone" class="form-control" id="phone">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Почта</label>
            <input name="email" type="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="password">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Повтор пароля</label>
            <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Регистрация</button>
      </form>
</x-layout>




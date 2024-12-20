<x-layout>
    <form action="{{ route('auth.login') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="login" class="form-label">Логин</label>
          <input type="login" class="form-control" id="login" aria-describedby="login field">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Пароль</label>
          <input type="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
      </form>
</x-layout>

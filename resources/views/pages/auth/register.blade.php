<x-layout>
    <form action="{{ route('auth.register') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="login" class="form-label">Логин</label>
          <input name="login" type="login" class="form-control" id="login" aria-describedby="login field" >
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Имя</label>
          <input name="name" type="name" class="form-control" id="name" aria-describedby="name field" >
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Почта</label>
          <input name="email" type="email" class="form-control" id="email" aria-describedby="email field" >
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Пароль</label>
          <input name="password" type="password" class="form-control" id="password">
        </div>
        <div class="mb-3">
          <label for="password_repeat" class="form-label">Повтор пароля</label>
          <input name="password_repeat" type="password" class="form-control" id="password_repeat">
        </div>
        <div class="mb-3 form-check">
          <input name="is_accept" type="checkbox" class="is_accept" id="is_accept">
          <label class="form-check-label" for="is_accept">Согласен на обработку персональных данных</label>
        </div>
        <button type="submit" class="btn btn-primary">Регистрация</button>
      </form>
</x-layout>




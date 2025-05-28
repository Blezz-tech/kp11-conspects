<div class="bg-body-tertiary">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{asset('logo.png')}}" width=40 alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @admin
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('admin.home') }}">Админка</a>
                            </li>
                        @endadmin
                        @auth
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('user.home') }}">Личный кабинет</a>
                            </li>
                        @endauth
                    </ul>
                    @guest
                        <ul class="navbar-nav gap-3">
                            <li class="nav-item">
                                <a class="btn btn-outline-primary" href="{{ route('loginform') }}">Вход</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-primary" href="{{ route('registerform') }}">Регистрация</a>
                            </li>
                        </ul>
                    @endguest
                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary">Выход</button>
                        </form>
                    @endauth
                </div>
            </div>
        </nav>
    </div>
</div>

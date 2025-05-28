<x-layout>
    <h1>Добавление категории</h1>
    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Название категории</label>
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
        <button type="submit" class="btn btn-primary">Создать категорию</button>
        <a class="btn btn-outline-primary" href="{{ route('admin.home') }}" role="button">Назад</a>
    </form>
</x-layout>

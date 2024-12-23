
<x-layout>
    <form action="{{ route('user.tickets.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input name="title" class="form-control" type="title" id="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea name="description" class="form-control" id="description" rows="3" ></textarea>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea name="description" class="form-control" id="description" rows="3" ></textarea>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Категория</label>
            <select name="category_id" class="form-control" aria-label="category_id" id="category_id">
                <option></option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Создать заявку</button>
      </form>
</x-layout>




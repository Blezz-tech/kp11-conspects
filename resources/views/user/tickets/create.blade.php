
<x-layout>
    <form action="{{ route('user.tickets.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input
                name="title"
                type="title"
                @class([
                    "form-control" => true,
                    "is-invalid" => $errors->has('title'),
                ])
                id="title"
                aria-describedby="titleHelp">
            @error('title')
                <div id="titleHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea
                name="description"
                @class([
                    "form-control" => true,
                    "is-invalid" => $errors->has('description'),
                ])
                id="description"
                rows="3"
                aria-describedby="descriptionHelp"
            ></textarea>
            @error('description')
                <div id="descriptionHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Описание</label>
            <select
                name="category_id"
                @class([
                    "form-control" => true,
                    "is-invalid" => $errors->has('category_id'),
                ])
                aria-label="category_id"
                aria-describedby="categoryIdHelp"
                id="category_id">
                <option></option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div id="categoryIdHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="photo_before" class="form-label">Файл заявки</label>
            <input
                name="photo_before"
                @class([
                    "form-control" => true,
                    "is-invalid" => $errors->has('photo_before'),
                ])
                type="file"
                aria-describedby="photoBeforeHelp"
                id="photo_before"
                accept=".jpg,.jpeg,.png,.bmp">
            @error('photo_before')
                <div id="photoBeforeHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Создать заявку</button>
      </form>
</x-layout>




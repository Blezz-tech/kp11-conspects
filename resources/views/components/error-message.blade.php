@if ($errors->any())
    <div class="mt-3 alert alert-danger fade show d-flex justify-content-between">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss='alert'></button>
    </div>
@endif

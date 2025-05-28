@if (session()->has('info'))
    <div class="container">
        <div class="alert alert-success fade show d-flex justify-content-between">
            <p style="margin: 0">{{ session('info') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss='alert'></button>
        </div>
    </div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $item)
        <div class="alert alert-danger alert-dismissible" role="alert">
            {{ $item }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endforeach
@endif

<div class="row">
    <div class="col-md-4">
        <ul class="list-group">
            <li class="list-group-item ">
                <strong>{{ $theses->title }}</strong><br>
                <small class="text-primary">{{ $theses->year }}</small>
            </li>

            <li class="list-group-item d-flex">
                <button type="button" class="btn btn-warning mx-3" data-bs-toggle="modal"
                    data-bs-target="#theses-{{ $theses->id }}">
                    Update
                </button>
                <a href="{{ url('/mahasiswa/theses/download', $theses->id) }}" class="btn btn-primary">Download</a>
            </li>
        </ul>
    </div>
    <div class="col-md-8">
        <embed type="application/pdf" src="{{ url(Storage::url($theses->file)) }}" width="100%"
            height="600"></embed>
    </div>
</div>

<div class="form-group">
    <form action="{{ url('/mahasiswa/theses/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <input type="hidden" name="id_student" value="{{ $student->id }}">
            <input type="hidden" name="id_major" value="{{ $student->id_major }}">
            <div class="col-12">
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Skripsi</label>
                    <textarea class="form-control" id="title" name="title" rows="3"></textarea>
                </div>
            </div>
            <div class="col">
                <label for="file">File Skripsi</label>
                <input type="file" class="form-control" name="file">
                <small>File harus berbentuk PDF</small>
            </div>
            <div class="col-3">
                <label for="year">Tahun</label>
                <select id="year" name="year" class="form-select">
                    <option>--pilih--</option>
                    @for ($i = 2019; $i <= date('Y'); $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                <small>Silahkan isi tahun skripsi</small>
            </div>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Upload skripsi</button>
        </div>
    </form>
</div>

<div class="card">
    <div class="card-header">
        <strong>Form Upload Skripsi</strong>
    </div>
    <div class="card-body">
        <div class="form-group">
            <form action="{{ url('/mahasiswa/theses/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="hidden" name="id_user" value="{{ $student->id }}">
                    <input type="hidden" name="id_major" value="{{ $student->id_major }}">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Skripsi</label>
                            <textarea class="form-control" id="title" name="title" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <label for="file">File Skripsi (sampai BAB 1)</label>
                        <input type="file" class="form-control" name="file">
                        <small>File harus berbentuk PDF, sampai bab 1</small>
                    </div>
                    <div class="col">
                        <label for="file">File Skripsi (keseluruhan)</label>
                        <input type="file" class="form-control" name="file2">
                        <small>File harus berbentuk PDF, keseluruhan </small>
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
                    <div class="col-12 mt-4">
                        <div class="my-2">
                            <strong>File tambahan</strong>
                        </div>
                        <table class="table table-borderles">
                            @foreach ($file_category as $file)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><strong>{{ $file->category }}</strong></td>
                                    <td>
                                        <input type="file" class="form-control" name="file{{ $file->id }}"
                                            {{ $file->is_required == 1 ? 'required' : '' }}>
                                        <small>File harus berbentuk PDF
                                            {!! $file->is_required == 1 ? '<span class="text-danger">(wajib diisi)</span>' : '(tidak wajib)' !!}</small>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Upload skripsi</button>
                </div>
            </form>
        </div>
    </div>
</div>

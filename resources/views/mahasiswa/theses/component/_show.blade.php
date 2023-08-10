<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Data Skripsi
            </div>
            <div class="card-body">
                <table class="table table-borderles">
                    <tr>
                        <td>Judul Skripsi</td>
                        <td>
                            <strong>{{ $theses->title }}</strong><br>
                            <small class="text-primary">{{ $theses->year }}</small>
                        </td>
                    </tr>
                    <tr>
                        <td>File Sebagian</td>
                        <td>
                            <a href="{{ url(Storage::url($theses->file)) }}" target="__blank"
                                class="btn btn-success mx-2">Lihat</a>
                        </td>
                    </tr>
                    <tr>
                        <td>File Keseluruhan</td>
                        <td>
                            <a href="{{ url(Storage::url($theses->file2)) }}" target="__blank"
                                class="btn btn-success mx-2">Lihat</a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-warning mx-2" data-bs-toggle="modal"
                    data-bs-target="#theses-{{ $theses->id }}">
                    Update
                </button>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <strong>File tambahan</strong>
            </div>
            <div class="card-body">
                <table class="table table-borderles">
                    @foreach ($file_category as $file)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $file->category }}</strong><br>
                                <small>{!! $file->is_required == 1 ? '<span class="text-danger">Wajib diupload</span>' : 'tidak wajib diupload' !!}</small>
                            </td>
                            <td>
                                @if (App\Models\AdditionalFile::cekAdditionalFile($file->id) != 0)
                                    <a href="{{ url(Storage::url(App\Models\AdditionalFile::getAdditionalFile($file->id)->file)) }}"
                                        target="__blank" class="btn btn-primary">Lihat</a>
                                @else
                                    <span class="badge bg-danger">{{ __('File tidak tersedia') }}</span>
                                @endif
                            </td>
                            <td>
                                @if (App\Models\AdditionalFile::cekAdditionalFile($file->id) != 0)
                                    <button type="button" class="btn btn-warning mx-2" data-bs-toggle="modal"
                                        data-bs-target="#additional-{{ $file->id }}">
                                        Update
                                    </button>
                                @else
                                    <a href="" class="btn btn-primary">Upload</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

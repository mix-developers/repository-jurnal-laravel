<div class="modal fade" id="theses-{{ $theses->id }}" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Skripsi {{ $theses->students->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="font-size:12px;"></button>
            </div>
            <form action="{{ url('/mahasiswa/theses/update', $theses->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul Skripsi</label>
                                <textarea class="form-control" id="title" name="title" rows="3">{{ $theses->title }}</textarea>
                            </div>
                        </div>
                        <div class="col">
                            <label for="file" class="form-label">File (Sampai BAB 1)</label>
                            <input type="file" class="form-control" name="file">
                            <small class="form-label">File harus berbentuk PDF</small>
                        </div>
                        <div class="col">
                            <label for="file" class="form-label">File (keseluruhan)</label>
                            <input type="file" class="form-control" name="file2">
                            <small class="form-label">File harus berbentuk PDF</small>
                        </div>
                        <div class="col-3">
                            <label for="year" class="form-label">Tahun</label>
                            <select id="year" name="year" class="form-select">
                                <option>--pilih--</option>
                                @for ($i = 2019; $i <= date('Y'); $i++)
                                    <option value="{{ $i }}"
                                        @if ($i == $theses->year) selected @endif>{{ $i }}</option>
                                @endfor
                            </select>
                            <small>Silahkan isi tahun skripsi</small>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@foreach ($file_category as $cat)
    <div class="modal fade" id="additional-add-{{ $cat->id }}" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">File {{ $cat->category }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="font-size:12px;"></button>
                </div>
                <form action="{{ url('/mahasiswa/theses/storeAdditional') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_category" value="{{ $cat->id }}">
                        <input type="hidden" name="category" value="{{ $cat->category }}">
                        <input type="file" class="form-control" name="file{{ $cat->id }}"
                            {{ $cat->is_required == 1 ? 'required' : '' }}>
                        <small>File harus berbentuk PDF

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
{{-- {{ dd($file_category) }} --}}
@forelse ($file_category as $cat)
    @if (App\Models\AdditionalFile::getAdditionalFile($cat->id) != null)
        <div class="modal fade" id="additional-{{ $cat->id }}" tabindex="-1" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">File {{ $cat->category }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="font-size:12px;"></button>
                    </div>
                    <form
                        action="{{ url('/mahasiswa/theses/updateAdditional', App\Models\AdditionalFile::getAdditionalFile($cat->id)->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <input type="hidden" name="category" value="{{ $cat->category }}">
                            <input type="file" class="form-control" name="file"
                                {{ $cat->is_required == 1 ? 'required' : '' }}>
                            <small>File harus berbentuk PDF

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@empty
@endforelse

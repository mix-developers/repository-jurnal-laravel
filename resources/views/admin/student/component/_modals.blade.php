@foreach ($file_category as $cat)
    <div class="modal fade" id="additional-add-{{ $cat->id }}" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">File {{ $cat->category }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/admin/theses/storeAdditional') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <input type="hidden" name="id_user" value="{{ $student->id }}">
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
    @if (App\Models\AdditionalFile::getAdditionalFileAdmin($cat->id, $student->id) != null)
        <div class="modal fade" id="additional-{{ $cat->id }}" tabindex="-1" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">File {{ $cat->category }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form
                        action="{{ url('/admin/theses/updateAdditional', App\Models\AdditionalFile::getAdditionalFileAdmin($cat->id, $student->id)->id) }}"
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

@if ($theses != null)
    <div class="modal fade" id="theses-{{ $theses->id }}" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Skripsi {{ $theses->students->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/admin/theses/update', $theses->id) }}" method="POST"
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
                                <label for="file">File (Sampai BAB 1)</label>
                                <input type="file" class="form-control" name="file">
                                <small>File harus berbentuk PDF</small>
                            </div>
                            <div class="col">
                                <label for="file">File (keseluruhan)</label>
                                <input type="file" class="form-control" name="file2">
                                <small>File harus berbentuk PDF</small>
                            </div>
                            <div class="col-3">
                                <label for="year">Tahun</label>
                                <select id="year" name="year" class="form-select">
                                    <option>--pilih--</option>
                                    @for ($i = 2019; $i <= date('Y'); $i++)
                                        <option value="{{ $i }}"
                                            @if ($i == $theses->year) selected @endif>{{ $i }}
                                        </option>
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
@endif
<div class="modal fade" id="create-theses" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Skripsi </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/theses/storeAdmin') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $student->id }}" name="id_user">
                <input type="hidden" value="{{ $student->id_major }}" name="id_major">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul Skripsi</label>
                                <textarea class="form-control" id="title" name="title" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <label for="file">File (Sampai BAB 1)</label>
                            <input type="file" class="form-control" name="file">
                            <small>File harus berbentuk PDF</small>
                        </div>
                        <div class="col">
                            <label for="file">File (keseluruhan)</label>
                            <input type="file" class="form-control" name="file2">
                            <small>File harus berbentuk PDF</small>
                        </div>
                        <div class="col-3">
                            <label for="year">Tahun</label>
                            <select id="year" name="year" class="form-select">
                                <option>--pilih--</option>
                                @for ($i = 2019; $i <= date('Y'); $i++)
                                    <option value="{{ $i }}">{{ $i }}
                                    </option>
                                @endfor
                            </select>
                            <small>Silahkan isi tahun skripsi</small>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="create-journal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Jurnal </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="{{ url('admin/journal/storeAdmin') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <input type="hidden" value="{{ $student->id }}" name="id_user">
                        <input type="hidden" value="{{ $student->id_major }}" name="id_major">
                        <p class="bg-info text-center p-2 text-white">
                            <strong>Identitas jurnal</strong>
                        </p>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Judul jurnal.." aria-describedby="defaultFormControlHelp" />
                                <div id="defaultFormControlHelp" class="form-text">masukkan judul dari jurnal</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label for="keywoards" class="form-label">kata kunci <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="keywoards" name="keywoards"
                                    placeholder="kata kunci jurnal.." aria-describedby="defaultFormControlHelp" />
                                <div id="defaultFormControlHelp" class="form-text">masukkan kata kunci dari jurnal
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="abstract" class="form-label">Abstrak <span
                                        class="text-danger">*</span></label>
                                <textarea id="editor" class="form-control " name="abstract" rows="10" cols="50"></textarea>
                                <div id="defaultFormControlHelp" class="form-text">masukkan abstrak dari jurnal</div>
                            </div>
                        </div>
                        <p class="bg-info text-center p-2 text-white">
                            <strong>Upload jurnal</strong>
                        </p>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="abstract" class="form-label">File jurnal halaman pertama <span
                                        class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="file">
                                <div id="defaultFormControlHelp" class="form-text">masukkan file jurnal halaman
                                    pertama
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="abstract" class="form-label">File jurnal keseluruhan <span
                                        class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="file2">
                                <div id="defaultFormControlHelp" class="form-text">masukkan file jurnal keseluruhan
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-lg btn-primary">Submit jurnal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if ($journal != null)
    <div class="modal fade" id="journal-{{ $journal->id }}" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Jurnal {{ $journal->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="{{ url('admin/journal/updateAdmin', $journal->id) }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id_file" value="{{ $files->id }}">
                            <p class="bg-info text-center p-2 text-white">
                                <strong>Identitas jurnal</strong>
                            </p>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Judul jurnal.." aria-describedby="defaultFormControlHelp"
                                        value="{{ $journal->title }}" />
                                    <div id="defaultFormControlHelp" class="form-text">masukkan judul dari jurnal
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="keywoards" class="form-label">kata kunci <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="keywoards" name="keywoards"
                                        placeholder="kata kunci jurnal.." aria-describedby="defaultFormControlHelp"
                                        value="{{ $journal->keywoards }}" />
                                    <div id="defaultFormControlHelp" class="form-text">masukkan kata kunci dari jurnal
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="abstract" class="form-label">Abstrak <span
                                            class="text-danger">*</span></label>
                                    <textarea id="editor" class="form-control " name="abstract" rows="10" cols="50"> {{ $journal->abstract }}</textarea>
                                    <div id="defaultFormControlHelp" class="form-text">masukkan abstrak dari jurnal
                                    </div>
                                </div>
                            </div>
                            <p class="bg-info text-center p-2 text-white">
                                <strong>Upload jurnal</strong>
                            </p>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="abstract" class="form-label">File jurnal halaman pertama <span
                                            class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="file">
                                    <div id="defaultFormControlHelp" class="form-text">masukkan file jurnal halaman
                                        pertama
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="abstract" class="form-label">File jurnal keseluruhan <span
                                            class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="file2">
                                    <div id="defaultFormControlHelp" class="form-text">masukkan file jurnal
                                        keseluruhan
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-lg btn-primary">Submit jurnal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

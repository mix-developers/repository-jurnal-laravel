<div class="card">
    <div class="card-header">
        File Journal
    </div>
    <div class="card-body {{ App\Models\JournalStatus::notifikasi()->id_status == 3 ? 'bg-warning text-white' : '' }}">
        @if (App\Models\JournalStatus::notifikasi()->id_status != 3)
            <table class="table table-bordered">
                <tr>
                    <td>File Halaman Pertama</td>
                    <td><a href="{{ url(Storage::url($files->file)) }}" target="__blank" class="btn btn-primary">Lihat</a>
                    </td>
                </tr>
                <tr>
                    <td>File Keseluruhan</td>
                    <td><a href="{{ url(Storage::url($files->file2)) }}" target="__blank" class="btn btn-primary">Lihat</a>
                    </td>
                </tr>
            </table>
        @else
            <div class="text-center">
                <form action="{{ url('/mahasiswa/journal/revisi', $files->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="{{ $journal->id }}" name="id_journal">
                    <div class="mb-3">
                        <label for="abstract" class="text-white">File jurnal halaman pertama <span
                                class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="file">
                        <div id="defaultFormControlHelp" class="text-white">masukkan file jurnal halaman pertama
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="abstract" class="text-white">File jurnal keseluruhan <span
                                class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="file2">
                        <div id="defaultFormControlHelp" class="text-white">masukkan file jurnal keseluruhan</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Revisi</button>
                </form>
            </div>
        @endif
    </div>
</div>

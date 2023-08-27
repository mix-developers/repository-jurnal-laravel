@if ($theses != null)
    <table class="table table-hover">
        <tr>
            <td>Judul<br>
                <small>Judul & tahun Skripsi</small>
            </td>
            <td><strong>{{ $theses->title }}</strong><br><small>{{ $theses->year }}</small></td>
        </tr>
        <tr>
            <td>File Skripsi<br>
                <small>File sebagian</small>
            </td>
            <td> <a href="{{ url(Storage::url($theses->file)) }}" target="__blank" class="btn btn-primary mx-2">Lihat</a>
            </td>
        </tr>
        <tr>
            <td>File Skripsi<br>
                <small>File keseluruhan</small>
            </td>
            <td> <a href="{{ url(Storage::url($theses->file2)) }}" target="__blank" class="btn btn-primary mx-2">Lihat</a>
            </td>
        </tr>
    </table>
@else
    <div class="text-center text-danger">
        Mahasiswa belum melakukan upload skripsi..<br>
        <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#create-theses">
            Upload Skripsi
        </button>
    </div>
@endif

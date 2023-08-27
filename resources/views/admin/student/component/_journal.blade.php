@if ($journal != null)
    <table class="table table-hover">
        <tr>
            <td>Judul<br>
                <small>Judul & katakunci jurnal</small>
            </td>
            <td><strong>{{ $journal->title }}</strong></td>
        </tr>
        <tr>
            <td>Status Jurnal
            </td>
            <td>
                @php $jurnal_statuses = App\Models\JournalStatus::notifikasiAdmin($student->id); @endphp
                <span
                    class="badge @if ($jurnal_statuses->id_status <= 2) bg-label-warning @elseif($jurnal_statuses->id_status == 3) bg-label-danger @else bg-label-primary @endif">
                    {{ $jurnal_statuses->statuses->status }}
                </span>
            </td>
        </tr>
        <tr>
            <td>File Jurnal<br>
                <small>File sebagian</small>
            </td>
            <td><a href="{{ url(Storage::url($files->file)) }}" target="__blank" class="btn btn-primary">Lihat</a></td>
        </tr>
        <tr>
            <td>File Jurnal<br>
                <small>File keseluruhan</small>
            </td>
            <td><a href="{{ url(Storage::url($files->file2)) }}" target="__blank" class="btn btn-primary">Lihat</a></td>
        </tr>
    </table>
@else
    <div class="text-center text-danger">
        Mahasiswa belum melakukan upload jurnal..<br>
        <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#create-journal">
            Upload Jurnal
        </button>
    </div>
@endif

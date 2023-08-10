@extends('layouts.backend.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ url('/admin/student') }}" class="btn btn-secondary mb-3">Kembali</a>
        </div>
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <strong>Identitas Mahasiswa</strong>
                </div>
                <div class="card-body">
                    <table class="table table-borderles">
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>NIM</td>
                            <td>Nomor HP</td>
                            <td>Email</td>
                        </tr>
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->identity }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->email }}</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong>Skripsi</strong>
                </div>
                <div class="card-body">
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
                                <td> <a href="{{ url(Storage::url($theses->file)) }}" target="__blank"
                                        class="btn btn-primary mx-2">Lihat</a></td>
                            </tr>
                            <tr>
                                <td>File Skripsi<br>
                                    <small>File keseluruhan</small>
                                </td>
                                <td> <a href="{{ url(Storage::url($theses->file2)) }}" target="__blank"
                                        class="btn btn-primary mx-2">Lihat</a></td>
                            </tr>
                        </table>
                    @else
                        <div class="text-center text-danger">
                            Mahasiswa belum melakukan upload skripsi
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header">
                    <strong>Jurnal</strong>
                </div>
                <div class="card-body">
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
                                <td><a href="{{ url(Storage::url($files->file)) }}" target="__blank"
                                        class="btn btn-primary">Lihat</a></td>
                            </tr>
                            <tr>
                                <td>File Jurnal<br>
                                    <small>File keseluruhan</small>
                                </td>
                                <td><a href="{{ url(Storage::url($files->file2)) }}" target="__blank"
                                        class="btn btn-primary">Lihat</a></td>
                            </tr>
                        </table>
                    @else
                        <div class="text-center text-danger">
                            Mahasiswa belum melakukan upload skripsi
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <strong>Pembimbing</strong>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Dosen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mentor as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $item->lecturer->title_first . $item->lecturer->full_name . $item->lecturer->title_end }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center">
                                        Belum ada pembimbing
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">
                    <strong>Penguji</strong>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Dosen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mentor_test as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $item->lecturer->title_first . $item->lecturer->full_name . $item->lecturer->title_end }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center">
                                        Belum ada penguji
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
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
                                    @if (App\Models\AdditionalFile::cekAdditionalFileAdmin($file->id, $student->id) != 0)
                                        <a href="{{ url(Storage::url(App\Models\AdditionalFile::getAdditionalFileAdmin($file->id, $student->id)->file)) }}"
                                            target="__blank" class="btn btn-primary">Lihat</a>
                                    @else
                                        <span class="badge bg-danger">{{ __('File tidak tersedia') }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $("#student").addClass("active");
    </script>
@endpush

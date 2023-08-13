@extends('layouts.backend.admin')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header flex-column flex-md-row">
                    <div class="head-label ">
                        <h5 class="card-title mb-0">{{ $title }}</h5>
                    </div>
                    <div class="dt-action-buttons text-end pt-3 pt-md-0">
                        <div class="dt-buttons btn-group flex-wrap">
                            <a href="{{ url('/jurusan/report/exportMahasiswa') }}" target="__blank" class="btn btn-primary"
                                target="__blank">
                                <span>
                                    <i class="bx bx-printer me-sm-1"> </i>
                                    <span class="d-none d-sm-inline-block">Cetak Data</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-datatable table-responsive">
                    <table id="datatable" class="table table-hover table-bordered">
                        <thead>
                            <tr class="bg-light">
                                <th>#</th>
                                <th>Nama Lengkap</th>
                                <th>NIM</th>
                                <th>Calon Wisuda</th>
                                <th>Upload Jurnal</th>
                                <th>Upload Skripsi</th>
                                <th>Upload Kelengkapan Berkas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }} </td>
                                    <td>{{ $item->identity }} </td>
                                    <td>{{ $item->is_graduate == 1 ? 'Calon Wisuda' : 'Belum' }} </td>
                                    <td>
                                        {!! App\Models\Journal::checkJournalExist($item->id) != 0
                                            ? '<span class="badge bg-success">Sudah</span>'
                                            : '<span class="badge bg-danger">Belum</span>' !!}
                                    </td>
                                    <td>
                                        {!! App\Models\Theses::checkThesesExist($item->id) != 0
                                            ? '<span class="badge bg-success">Sudah</span>'
                                            : '<span class="badge bg-danger">Belum</span>' !!}
                                    </td>
                                    <td>
                                        <ol>
                                            @forelse (App\Models\AdditionalFile::cekAdditionalFileJurusan($item->id) as $file)
                                                <li>
                                                    {{ $file->file_category->category }}
                                                </li>
                                            @empty
                                                <li class="text-danger">
                                                    Belum ada file
                                                </li>
                                            @endforelse
                                        </ol>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>NIM</th>
                                <th>Email</th>
                                <th>No HP</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $("#report_mahasiswa").addClass("active");
    </script>
@endpush

@extends('layouts.backend.admin')

@section('content')
    <div class="row ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Skripsi</div>
                <div class="card-datatable table-responsive">
                    <table id="datatable" class="table table-hover table-bordered" style="font-size: 12px;">
                        <thead>
                            <tr class="bg-light">
                                <th>#</th>
                                <th>Nama</th>
                                <th>Judul</th>
                                <th>Lihat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\Theses::getAll() as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td width="150"><strong
                                            class="text-primary">{{ $item->students->full_name }}</strong><br>{{ $item->major->name }}
                                    </td>
                                    <td>
                                        <b>{{ Str::limit($item->title, 100) }}</b><br>
                                        <span class="badge bg-label-secondary">{{ $item->year }}</span>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                                            data-bs-target="#theses-{{ $item->id }}">
                                            Buka
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama </th>
                                <th>Judul</th>
                                <th>Lihat</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">Daftar Jurnal</div>
                <div class="card-datatable table-responsive">
                    <table id="datatable2" class="table table-hover table-bordered" style="font-size: 12px;">
                        <thead>
                            <tr class="bg-light">
                                <th>#</th>
                                <th>Nama</th>
                                <th>Judul</th>
                                <th>Lihat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\Journal::getAll() as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td width="150"><strong
                                            class="text-primary">{{ $item->students->full_name }}</strong>
                                    </td>
                                    <td>
                                        <b>{{ Str::limit($item->title, 100) }}</b><br>
                                        <span class="badge bg-label-secondary">{{ $item->keywoards }}</span>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                                            data-bs-target="#journal-{{ $item->id }}">
                                            Buka
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama </th>
                                <th>Judul</th>
                                <th>Lihat</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>test</h5>
                </div>
            </div>
        </div>
    </div>
    @include('mahasiswa.dashboard_component._modals')
@endsection
@push('js')
    <script type="text/javascript">
        $("#dashboard").addClass("active");
    </script>
@endpush

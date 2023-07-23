@push('css')
@endpush
@extends('layouts.backend.admin')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header flex-column flex-md-row">
                    <div class="head-label ">
                        <h5 class="card-title mb-0">{{ $title }}</h5>
                    </div>
                    <div class=" text-end pt-3 pt-md-0">
                        <div class="btn-group flex-wrap">
                            <a class="btn btn-primary" href="{{ url('/mahasiswa/journal/create') }}">
                                <span>
                                    <i class="bx bx-plus me-sm-1"> </i>
                                    <span class="d-none d-sm-inline-block">Ajukan Jurnal</span>
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
                                <th>NIM</th>
                                <th>Nama Lengkap </th>
                                <th>Judul</th>
                                <th>Kata Kunci</th>
                                <th>kontributor</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($journal as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->students->identity }}</td>
                                    <td>{{ $item->students->full_name }}</td>
                                    <td>{{ Str::limit($item->title, 50) }}</td>
                                    <td>{{ $item->keywoards }}</td>
                                    <td>
                                        <span class="badge bg-label-danger">Belum ada kontributor</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ url('/admin/journal/show', encrypt($item->id)) }}"><i
                                                            class="bx bx-show me-1"></i> Detail</a>
                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>NIM</th>
                                <th>Nama Lengkap </th>
                                <th>Judul</th>
                                <th>Kata Kunci</th>
                                <th>kontributor</th>
                                <th>Aksi</th>
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
        $("#journal").addClass("active");
    </script>
@endpush

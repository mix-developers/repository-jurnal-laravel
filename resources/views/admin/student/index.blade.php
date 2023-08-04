@push('css')
@endpush
@extends('layouts.backend.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 my-2">
            @if ($errors->any())
                @foreach ($errors->all() as $item)
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        {{ $item }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header flex-column flex-md-row">
                    <div class="head-label ">
                        <h5 class="card-title mb-0">{{ $title }}</h5>
                    </div>

                </div>

                <div class="card-datatable table-responsive">
                    <table id="datatable" class="table table-hover table-bordered">
                        <thead>
                            <tr class="bg-light">
                                <th>#</th>
                                <th>Nama Lengkap </th>
                                <th>Jurusan</th>
                                <th>No HP</th>
                                <th>Pembimbing</th>
                                <th>Penguji</th>
                                <th>Calon Wisuda</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <strong> {{ $item->name }}</strong><br>
                                        <small>{{ $item->identity }}</small>
                                    </td>
                                    <td>{{ $item->major->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        <span class="badge bg-label-danger">Belum Memiliki Pembimbing</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-label-danger">Belum Memiliki Penguji</span>
                                    </td>
                                    <td>
                                        @if ($item->is_graduate == 0)
                                            <form action="{{ url('/admin/users/graduated', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="1" name="is_graduate">
                                                <button type="submit" class="btn btn-sm btn-primary"><i
                                                        class="bx bx-check"></i> Varifikasi</button>
                                            </form>
                                        @else
                                            <i class="bx bx-check text-primary"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/student/show', $item->id) }}"
                                            class="btn btn-sm text-primary">
                                            <i class="bx bx-show"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama Lengkap </th>
                                <th>Jurusan</th>
                                <th>No HP</th>
                                <th>Pembimbing</th>
                                <th>Penguji</th>
                                <th>Calon Wisuda</th>
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
        $("#student").addClass("active");
    </script>
@endpush

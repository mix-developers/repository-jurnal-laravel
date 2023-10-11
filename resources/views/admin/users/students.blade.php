@extends('layouts.backend.admin')

@section('content')
    @include('layouts.backend.alert')
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header flex-column flex-md-row">
                    <div class="head-label ">
                        <h5 class="card-title mb-0">{{ $title }}</h5>
                    </div>
                    <div class="dt-action-buttons text-end pt-3 pt-md-0">
                        <div class="dt-buttons btn-group flex-wrap">
                            <button class="btn btn-secondary create-new btn-primary" type="button" class="btn btn-primary"
                                data-bs-toggle="modal" data-bs-target="#create">
                                <span>
                                    <i class="bx bx-plus me-sm-1"> </i>
                                    <span class="d-none d-sm-inline-block">Tambah Data</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-datatable table-responsive">
                    <table id="datatable" class="table table-hover table-bordered">
                        <thead>
                            <tr class="bg-light">
                                <th>#</th>
                                <th>Name</th>
                                <th>NIM</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }} </td>
                                    <td>{{ $item->identity }} </td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ url('/admin/users/show', $item->id) }}"><i class="bx bx-show"></i></a>
                                        <form method="POST" action="{{ url('admin/users/destroy', $item->id) }}"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn delete-button"><i
                                                    class="bx bx-trash me-1 text-danger"></i>
                                            </button>
                                        </form>
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
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.users.component.modal_create_mahasiswa')
@endsection
@push('js')
    <script type="text/javascript">
        $("#users_students").addClass("active");
    </script>
@endpush

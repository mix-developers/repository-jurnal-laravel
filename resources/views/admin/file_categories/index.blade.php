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
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Jenis File</h5>
                </div>
                <form method="POST" action="{{ url('admin/file_categories/store') }}" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <div class="col mb-3">
                            <label for="category" class="form-label">Jenis File</label>
                            <input type="text" id="category" name="category" class="form-control" placeholder="Jenis" />
                        </div>
                        <div class="col mb-3">
                            <input type="checkbox" name="is_required" value="1">
                            <label for="is_required" class="form-label"> Required</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
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
                                <th>Jenis</th>
                                <th>Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($file_categories as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <strong>{{ $item->category }} </strong>
                                        <br><small>{{ $item->is_required == 1 ? 'Wajib' : 'Tidak Wajib' }} </small></span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#edit-{{ $item->id }}" href=""><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>

                                                </div>
                                            </div>
                                            <form method="POST"
                                                action="{{ url('admin/file_categories/destroy', $item->id) }}"
                                                class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn "><i
                                                        class="bx bx-trash me-1 text-danger"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @include('admin.file_categories.modal_edit')
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Jenis</th>
                                <th>Aksi </th>
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
        $("#file_categories").addClass("active");
    </script>
@endpush

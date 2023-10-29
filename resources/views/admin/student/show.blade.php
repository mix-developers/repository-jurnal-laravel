@extends('layouts.backend.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ url('/admin/student') }}" class="btn btn-secondary mb-3">Kembali</a>
        </div>
        @include('admin.student.component._error')
        @include('admin.student.component._information')

        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card ">
                    <div class="card-header">
                        <strong>Skripsi</strong>
                    </div>
                    <div class="card-body">
                        @include('admin.student.component._theses')
                    </div>
                    @if (Auth::user()->role == 'admin' && $theses != null)
                        <div class="card-footer">
                            <button type="button" class="btn btn-warning mx-2" data-bs-toggle="modal"
                                data-bs-target="#theses-{{ $theses->id }}">
                                Update
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        <strong>Jurnal</strong>
                    </div>
                    <div class="card-body">
                        @include('admin.student.component._journal')
                    </div>
                    @if (Auth::user()->role == 'admin' && $journal != null)
                        <div class="card-footer">
                            <button type="button" class="btn btn-warning mx-2" data-bs-toggle="modal"
                                data-bs-target="#journal-{{ $journal->id }}">
                                Update
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        <strong>Data pembimbing</strong>
                    </div>
                    <div class="card-body">
                        @include('admin.student.component._table_pembimbing')
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        <strong>Data penguji</strong>
                    </div>
                    <div class="card-body">
                        @include('admin.student.component._table_penguji')
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        <strong>File tambahan</strong>
                    </div>
                    <div class="card-body">
                        @include('admin.student.component._additional_file')

                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card ">
                    <div class="card-header">
                        <strong>Bidang Riset</strong>
                    </div>
                    <div class="card-body">
                        @include('admin.student.component._input_riset')
                    </div>

                </div>
            </div>
        </div>


    </div>
    @include('admin.student.component._modals')
@endsection
@push('js')
    <script type="text/javascript">
        $("#student").addClass("active");
    </script>
@endpush

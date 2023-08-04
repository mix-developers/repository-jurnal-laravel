@extends('layouts.backend.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($theses == null)
                <div class="alert alert-danger my-4" role="alert">
                    Anda belum mengupload file skripsi, harap segera upload file skripsi anda..
                </div>
                <div class="alert alert-warning alert-dismissible my-3" role="alert">
                    Pastikan file skripsi telah selesai sebelum di upload..
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif
            @include('mahasiswa.theses.component._error')
            <div class="card">
                <div class="card-header"> <strong>Skripsi {{ Auth::user()->name }}</strong></div>
                <div class="card-body">
                    @if ($theses == null)
                        @include('mahasiswa.theses.component._form')
                    @else
                        @include('mahasiswa.theses.component._show')
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('mahasiswa.theses.component._update')
@endsection
@push('js')
    <script type="text/javascript">
        $("#theses").addClass("active");
    </script>
@endpush

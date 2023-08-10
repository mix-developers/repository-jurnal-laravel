@extends('layouts.backend.admin')

@section('content')
    <div class="row mb-3">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <strong>Data pembimbing</strong>
                </div>
                <div class="card-body">
                    @include('mahasiswa.mentor.component._table_pembimbing')
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <strong>Data penguji</strong>
                </div>
                <div class="card-body">
                    @include('mahasiswa.mentor.component._table_penguji')
                </div>
            </div>
        </div>

    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $("#mentor").addClass("active");
    </script>
@endpush

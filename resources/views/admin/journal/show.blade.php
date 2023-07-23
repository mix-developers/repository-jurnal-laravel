@extends('layouts.backend.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ url('/admin/journal') }}" class="btn btn-secondary mb-3">Kembali</a>
            <div class="card">
                <div class="card-header">{{ $title }}</div>

                <div class="card-body">
                    show journal
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

@push('css')
@endpush
@extends('layouts.backend.admin')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-12">
            @include('mahasiswa.journal.component.error')

            @include('mahasiswa.journal.component.alert')

            @if ($journal != null)
                <div class="row">
                    <div class="col-md-4">
                        @include('mahasiswa.journal.component.identity')
                        <br>
                        @include('mahasiswa.journal.component.files')
                    </div>
                    <div class="col-md-8">
                        @include('mahasiswa.journal.component.identity_journal')
                    </div>
                </div>
                @include('mahasiswa.journal.component.statuses')
            @else
                @include('mahasiswa.journal.component.form')
            @endif
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $("#journal").addClass("active");
    </script>
@endpush

@extends('layouts.backend.admin')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-3 col-md-4">
            @include('admin.dashboard_component.card2', [
                'titleCard' => 'Mahasiswa',
                'subtitle' => 'Total Mahasiswa',
                'fontColor' => 'text-white',
                'backgroundColor' => 'bg-primary',
                'content' => $mahasiswa,
            ])
        </div>
        <div class="col-lg-3 col-md-4">
            @include('admin.dashboard_component.card2', [
                'titleCard' => 'Dosen',
                'subtitle' => 'Total Dosen',
                'fontColor' => '',
                'backgroundColor' => '',
                'content' => $dosen,
            ])
        </div>
        <div class="col-lg-3 col-md-4">
            @include('admin.dashboard_component.card2', [
                'titleCard' => 'Jurnal',
                'subtitle' => 'Total Jurnal',
                'fontColor' => '',
                'backgroundColor' => '',
                'content' => $jurnal,
            ])
        </div>
        <div class="col-lg-3 col-md-4">
            @include('admin.dashboard_component.card2', [
                'titleCard' => 'Skripsi',
                'subtitle' => 'Total Skripsi',
                'fontColor' => '',
                'backgroundColor' => '',
                'content' => $skripsi,
            ])
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $("#dashboard").addClass("active");
    </script>
@endpush

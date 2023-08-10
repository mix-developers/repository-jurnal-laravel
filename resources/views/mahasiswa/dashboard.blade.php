@extends('layouts.backend.admin')

@section('content')
    @include('mahasiswa.dashboard_component._welcome')
    @if (App\Models\Mentor::checkMentorGuide() < 1 && App\Models\Mentor::checkMentorTest() < 1)
        @include('mahasiswa.dashboard_component._input_mentors')
    @else
        @include('mahasiswa.dashboard_component._progress')
        @if (App\Models\Journal::checkJournal() <= 0)
            @include('mahasiswa.dashboard_component._input_journal')
        @endif
        @if (App\Models\Theses::checkTheses() <= 0)
            @include('mahasiswa.dashboard_component._input_theses')
        @endif
    @endif
    <div class="row ">

    </div>
    @include('mahasiswa.dashboard_component._modals')
@endsection
@push('js')
    <script type="text/javascript">
        $("#dashboard").addClass("active");
    </script>
@endpush

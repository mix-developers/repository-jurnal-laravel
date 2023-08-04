@extends('layouts.frontend.app')

@section('content')
    <!-- Sections:Start -->

    <div data-bs-spy="scroll" class="scrollspy-example">
        @include('pages.component._title')
        <div class="text-center mt-4 container">
            <h5 class="bg-label-primary py-4" style="border-radius: 20px;">{{ $results }} Hasil ditemukan</h5>
        </div>
        <!-- Useful features: Start -->
        {{-- @include('pages.component._journals')

        @include('pages.component._theses') --}}
        @include('pages.component._list_all')

    </div>
    <!-- / Sections:End -->
    @include('pages.component._modals_theses')
    @include('pages.component._modals_journal')
    {{-- @include('pages.component._footer') --}}
@endsection

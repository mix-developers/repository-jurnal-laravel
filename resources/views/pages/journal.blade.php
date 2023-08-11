@extends('layouts.frontend.app')

@section('content')
    <!-- Sections:Start -->

    <div data-bs-spy="scroll" class="scrollspy-example">
        @include('pages.component._title')

        <!-- Useful features: Start -->
        @include('pages.component._journals')



    </div>

    <!-- / Sections:End -->
    @include('pages.component._modals_journal')
    {{-- @include('pages.component._footer') --}}
@endsection

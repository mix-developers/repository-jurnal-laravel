@extends('layouts.frontend.app')

@section('content')
    <!-- Sections:Start -->

    <div data-bs-spy="scroll" class="scrollspy-example">
        @include('pages.component._title')
        <!-- Useful features: Start -->
        @include('pages.component._journals')
        <div class="text-center">
            <a href="{{ url('/journal') }}" class="btn btn-primary">Lihat jurnal lainnya...<i
                    class="bx bx-right-arrow-alt"></i></a>
        </div>
        @include('pages.component._theses')
        <div class="text-center mb-4">
            <a href="{{ url('/theses') }}" class="btn btn-primary">Lihat skripsi lainnya...<i
                    class="bx bx-right-arrow-alt"></i></a>
        </div>
    </div>
    <!-- / Sections:End -->


    @include('pages.component._modals_theses')
    @include('pages.component._modals_journal')
    {{-- @include('pages.component._footer') --}}
@endsection

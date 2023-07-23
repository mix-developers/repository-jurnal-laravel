@extends('layouts.frontend.app')

@section('content')
    <!-- Sections:Start -->

    <div data-bs-spy="scroll" class="scrollspy-example">
        @include('pages.component._title')

        <!-- Useful features: Start -->
        @include('pages.component._journals')
        @include('pages.component._theses')


    </div>

    <!-- / Sections:End -->


    @include('pages.component._modals')
    @include('pages.component._footer')
@endsection
@push('js')
    <script>
        var myFrame = document.getElementById('myFrame');

        myFrame.window.eval('document.addEventListener("contextmenu", function (e) {e.preventDefault();}, false)');
    </script>
@endpush

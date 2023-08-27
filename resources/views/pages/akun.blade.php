@extends('layouts.frontend.app')

@section('content')
    <!-- Sections:Start -->

    <div data-bs-spy="scroll" class="scrollspy-example">
        @include('pages.component._title')
        <div class="text-center mt-4 container">
            <h5 class="bg-label-primary py-4" style="border-radius: 20px;">Hi! {{ $user->name }} ini informasi akun anda..
            </h5>
        </div>
        @if (Session::has('success'))
            <div class="container my-3">
                <div class="alert alert-primary alert-dismissible" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            </div>
        @endif
        @if (Session::has('danger'))
            <div class="container my-3">
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ Session::get('danger') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="container">
                @foreach ($errors->all() as $item)
                    <div class="alert alert-danger alert-dismissible my-3" role="alert">
                        {{ $item }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    @include('pages.component._menu_akun')
                </div>
                <div class="col-md-10">
                    @include('pages.component._akun')
                </div>
            </div>
        </div>
        {{-- @if (Auth::user()->role != 'mahasiswa')
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        @include('pages.component._menu_akun')
                    </div>
                    <div class="col-md-10">
                        @include('pages.component._akun')
                    </div>
                </div>
            </div>
        @else
            <div class="container">
                @include('pages.component._akun')
            </div>
        @endif --}}
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $("#akun").addClass("active");
    </script>
@endpush

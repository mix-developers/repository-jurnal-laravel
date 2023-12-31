@extends('layouts.backend.admin')

@section('content')
    <div class="row justify-content-center">
        @if ($errors->any())
            @foreach ($errors->all() as $item)
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible my-3" role="alert">
                        {{ $item }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="col-md-12">
            @if (App\Models\JournalStatus::where('id_journal', $journal->id)->orderBy('id', 'desc')->first()->id_status < 3)
                <div class="d-flex justify-content-end mx-2 mb-4">
                    <button class="btn btn-success mx-2" type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#accept">
                        Accept Jurnal
                    </button>

                    <button class="btn btn-danger" type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#reject">
                        Reject Jurnal
                    </button>

                </div>
            @else
                @if (App\Models\JournalStatus::where('id_journal', $journal->id)->orderBy('id', 'desc')->first()->id_status == 4)
                    @if ($journal->is_published == 0)
                        <div class="d-flex justify-content-end mx-2 mb-4">
                            <button class="btn btn-success mx-2" type="button" class="btn btn-primary"
                                data-bs-toggle="modal" data-bs-target="#publish">
                                Publish Jurnal
                            </button>
                        </div>
                    @else
                        <div class="my-3">
                            <div class="alert alert-primary alert-dismissible" role="alert">
                                Joural ini telah publish
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mx-2 mb-4">
                            <button class="btn btn-danger mx-2" type="button" class="btn btn-primary"
                                data-bs-toggle="modal" data-bs-target="#publish">
                                Reject Publish Jurnal
                            </button>
                        </div>
                    @endif
                @endif
            @endif

            <div class="row">
                <div class="col-md-4">
                    @include('mahasiswa.journal.component.identity')
                    <br>
                    <div class="card">
                        <div class="card-header">
                            File Journal
                        </div>
                        <div class="card-body ">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Abstrak</td>
                                    <td><a href="{{ url(Storage::url($files->file)) }}" target="__blank"
                                            class="btn btn-primary">Lihat</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>File Keseluruhan</td>
                                    <td><a href="{{ url(Storage::url($files->file2)) }}" target="__blank"
                                            class="btn btn-primary">Lihat</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    @include('mahasiswa.journal.component.identity_journal')
                </div>
            </div>
            @include('mahasiswa.journal.component.statuses')
        </div>
    </div>
    @include('admin.journal.modal')
@endsection
@push('js')
    <script type="text/javascript">
        $("#journal").addClass("active");
    </script>
@endpush

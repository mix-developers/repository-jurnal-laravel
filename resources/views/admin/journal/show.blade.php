@extends('layouts.backend.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (App\Models\JournalStatus::where('id_journal', $journal->id)->latest()->first()->id_status < 3)
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
                @if ($journal->is_published == 0)
                    <div class="d-flex justify-content-end mx-2 mb-4">
                        <form action="{{ url('/admin/journal/publish', $journal->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary"><i class="bx bx-check me-1"></i>Publish</button>
                        </form>
                    </div>
                @else
                    <div class="my-3">
                        <div class="alert alert-primary alert-dismissible" role="alert">
                            Joural ini telah publish
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
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
                                    <td>File Halaman Pertama</td>
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

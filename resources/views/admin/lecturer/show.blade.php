@extends('layouts.backend.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ url('/admin/lecturer') }}" class="btn btn-secondary mb-3">Kembali</a>
            <div class="row mb-3">
                <div class="col-md-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <h2>{{ $mentor->count() }}</h2>
                            <span class="text-primary">Total Membimbing</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <h2>{{ $mentor_test->count() }}</h2>
                            <span class="text-primary">Total Menguji</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            Data Bimbingan
                        </div>
                        <div class="card-body">
                            <table class="table table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mahasiswa</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($mentor as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->user->name }}<br><small>{{ $item->user->identity }}</small></td>
                                            <td><a href="{{ url('/admin/student/show', $item->id_user) }}"
                                                    class="btn btn-primary">Lihat</a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center">Belum ada bimbingan</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            Data Nguji
                        </div>
                        <div class="card-body">
                            <table class="table table-hover" id="datatable2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mahasiswa</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($mentor_test as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->user->name }}<br><small>{{ $item->user->identity }}</small></td>
                                            <td><a href="{{ url('/admin/student/show', $item->id_user) }}"
                                                    class="btn btn-primary">Lihat</a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center">Belum menguji</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $("#lecturer").addClass("active");
    </script>
@endpush

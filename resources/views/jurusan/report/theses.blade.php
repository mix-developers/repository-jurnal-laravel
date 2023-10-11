@push('css')
@endpush
@extends('layouts.backend.admin')

@section('content')
    @include('layouts.backend.alert')
    <div class="row justify-content-center">

        <div class="col-md-12">
            <form action="{{ url('/' . Auth::user()->role . '/report/exportTheses') }}" method="GET">
                <div class="row my-3">
                    <div class="col-md-6">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31">Dari tanggal</span>
                            <input type="date" class="form-control" placeholder="Dari" name="from_date"
                                value="{{ date('Y-m-d', strtotime('-1 month')) }}">
                            <span class="input-group-text" id="basic-addon-search31">Sampai</span>
                            <input type="date" class="form-control" placeholder="Sampai" name="to_date"
                                value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary"><i class="bx bx-printer me-sm-1"> </i>
                            <span class="d-none d-sm-inline-block">Cetak Data</span></button>
                    </div>
                </div>
            </form>
            <div class="card">
                <div class="card-header flex-column flex-md-row">
                    <div class="head-label ">
                        <h5 class="card-title mb-0">{{ $title }}</h5>
                    </div>
                    {{-- <div class="dt-action-buttons text-end pt-3 pt-md-0">
                        <div class="dt-buttons btn-group flex-wrap">
                            @if (Auth::user()->role == 'jurusan')
                                <a href="{{ url('/jurusan/report/exportTheses') }}" class="btn btn-primary"
                                    target="__blank">
                                    <span>
                                        <i class="bx bx-printer me-sm-1"> </i>
                                        <span class="d-none d-sm-inline-block">Cetak Data</span>
                                    </span>
                                </a>
                            @else
                                <a href="{{ url('/admin/report/exportTheses') }}" class="btn btn-primary" target="__blank">
                                    <span>
                                        <i class="bx bx-printer me-sm-1"> </i>
                                        <span class="d-none d-sm-inline-block">Cetak Data</span>
                                    </span>
                                </a>
                            @endif
                        </div>
                    </div> --}}
                </div>

                <div class="card-datatable table-responsive">
                    <table id="datatable" class="table table-hover table-bordered">
                        <thead>
                            <tr class="bg-light">
                                <th>#</th>
                                <th>Mahasiswa</th>
                                {{-- <th>Jurusan</th> --}}
                                <th>Judul</th>
                                <th>Pembimbing</th>
                                <th>Penguji</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($theses as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><strong>{{ $item->students->name }}</strong><br>
                                        <small>{{ $item->students->identity }}</small>
                                    </td>
                                    {{-- <td>{{ $item->major->name }}</td> --}}
                                    <td>
                                        <b>{{ Str::limit($item->title) }}</b><br>
                                        <span class="badge bg-label-secondary">{{ $item->year }}</span>
                                    </td>
                                    <td>
                                        <ol>
                                            @forelse (App\Models\Mentor::getMentor($item->id_user) as $list)
                                                <li>{{ $list->lecturer->title_first }}
                                                    {{ $list->lecturer->full_name }} {{ $list->lecturer->title_end }}</li>
                                            @empty
                                                <span class="badge bg-label-danger">Belum Memiliki Pembimbing</span>
                                            @endforelse
                                        </ol>
                                    </td>
                                    <td>
                                        <ol>
                                            @forelse (App\Models\Mentor::getMentorTest($item->id_user) as $list)
                                                <li>{{ $list->lecturer->title_first }}
                                                    {{ $list->lecturer->full_name }} {{ $list->lecturer->title_end }}</li>
                                            @empty
                                                <span class="badge bg-label-danger">Belum Memiliki Penguji</span>
                                            @endforelse
                                        </ol>
                                    </td>
                                    {{-- <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ url('/admin/theses/show', encrypt($item->id)) }}"><i
                                                class="bx bx-show"></i></a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Mahasiswa</th>
                                {{-- <th>Jurusan</th> --}}
                                <th>Judul</th>
                                <th>Pembimbing</th>
                                <th>Penguji</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $("#report_theses").addClass("active");
    </script>
@endpush

@push('css')
@endpush
@extends('layouts.backend.admin')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header flex-column flex-md-row">
                    <div class="head-label ">
                        <h5 class="card-title mb-0">{{ $title }}</h5>
                    </div>
                    <div class="dt-action-buttons text-end pt-3 pt-md-0">
                        <div class="dt-buttons btn-group flex-wrap">
                            <a href="{{ url('/jurusan/report/exportTheses') }}"class="btn btn-primary" target="__blank">
                                <span>
                                    <i class="bx bx-printer me-sm-1"> </i>
                                    <span class="d-none d-sm-inline-block">Cetak Data</span>
                                </span>
                            </a>
                        </div>
                    </div>
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
                                        <b>{{ Str::limit($item->title, 50) }}</b><br>
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

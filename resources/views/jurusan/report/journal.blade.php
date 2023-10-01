@push('css')
@endpush
@extends('layouts.backend.admin')

@section('content')
    @include('layouts.backend.alert')
    <div class="row justify-content-center">
        <form action="{{ url('/' . Auth::user()->role . '/report/exportJournal') }}" method="GET">
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header flex-column flex-md-row">
                    <div class="head-label ">
                        <h5 class="card-title mb-0">{{ $title }}</h5>
                    </div>
                    {{-- <div class="dt-action-buttons text-end pt-3 pt-md-0">
                        <div class="dt-buttons btn-group flex-wrap">
                            @if (Auth::user()->role == 'jurusan')
                                <a href="{{ url('/jurusan/report/exportJournal') }}" class="btn btn-primary"
                                    target="__blank">
                                    <span>
                                        <i class="bx bx-printer me-sm-1"> </i>
                                        <span class="d-none d-sm-inline-block">Cetak Data</span>
                                    </span>
                                </a>
                            @else
                                <a href="{{ url('/admin/report/exportJournal') }}" class="btn btn-primary" target="__blank">
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
                                <th>Nama Lengkap </th>
                                <th>Judul</th>
                                <th>Dosen Pembimbing</th>
                                <th>Status</th>
                                <th>Publish</th>
                                {{-- <th>Lihat</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($journal as $item)
                                @php
                                    $status_journal = App\Models\JournalStatus::where('id_journal', $item->id)
                                        ->orderBy('id', 'desc')
                                        ->first();
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><strong>{{ $item->students->name }}</strong><br>{{ $item->students->identity }}</td>
                                    <td>
                                        <strong>{{ Str::limit($item->title, 50) }}</strong><br>
                                        <small>Kata Kunci : {{ Str::limit($item->keywoards, 100) }}</small>
                                    </td>
                                    <td>
                                        <ol>
                                            @forelse (App\Models\Mentor::getMentor($item->id_user) as $list)
                                                <li>{{ $list->lecturer->title_first }}
                                                    {{ $list->lecturer->full_name }} {{ $list->lecturer->title_end }}</li>
                                            @empty
                                                <span class="badge bg-label-danger">Belum ada kontributor</span>
                                            @endforelse
                                        </ol>
                                    </td>
                                    <td>
                                        <span
                                            class="badge @if ($status_journal->id_status <= 2) bg-label-warning @elseif($status_journal->id_status == 3) bg-label-danger @else bg-label-primary @endif">{{ $status_journal->statuses->status }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge @if ($item->is_published == 0) bg-label-light  @else bg-label-primary @endif">{{ $item->is_published == 0 ? '-' : 'Published' }}</span>
                                    </td>
                                    {{-- <td>
                                        @if (App\Models\JournalStatus::checkJournal($item->id) <= 0)
                                            <form action="{{ url('/admin/journal/check') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" value="{{ $item->id }}" name="id_journal">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="bx bx-show me-1"></i>Lihat</button>
                                            </form>
                                        @else
                                            <a href="{{ url('/admin/journal/show', $item->id) }}"
                                                class="btn btn-primary"><i class="bx bx-show me-1"></i>Lihat</a>
                                        @endif
                                    </td> --}}
                                    {{-- <td>
                                        <div class="d-flex align-items-center">
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ url('/admin/journal/show', encrypt($item->id)) }}"><i
                                                            class="bx bx-show me-1"></i> Detail</a>
                                                </div>
                                            </div>

                                        </div>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama Lengkap </th>
                                <th>Judul</th>
                                <th>kontributor</th>
                                <th>Status</th>
                                <th>Publish</th>
                                {{-- <th>Lihat</th> --}}
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
        $("#report_journal").addClass("active");
    </script>
@endpush

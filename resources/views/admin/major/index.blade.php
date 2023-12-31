@push('css')
@endpush
@extends('layouts.backend.admin')
@section('content')
    <div class="row justify-content-center">
        <div class="col-12 my-2">
            @if ($errors->any())
                @foreach ($errors->all() as $item)
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        {{ $item }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header flex-column flex-md-row">
                    <div class="head-label ">
                        <h5 class="card-title mb-0">Data Jurusan</h5>
                    </div>
                    <div class="dt-action-buttons text-end pt-3 pt-md-0">
                        <div class="dt-buttons btn-group flex-wrap">
                            <!-- <button class="btn btn-secondary create-new btn-primary" type="button" class="btn btn-primary"
                                data-bs-toggle="modal" data-bs-target="#create">
                                <span>
                                    <i class="bx bx-plus me-sm-1"> </i>
                                    <span class="d-none d-sm-inline-block">Tambah Data</span>
                                </span>
                            </button> -->
                        </div>

                    </div>
                </div>

                <div class="card-datatable table-responsive">
                    <table id="datatable" class="table table-hover table-bordered">
                        <thead>
                            <tr class="bg-light">
                                <th>#</th>
                                <th>Nama Jurusan</th>
                                <th>Ketua Jurusan </th>
                                <th>Jumlah Mahasiswa</th>
                                <th>Jurnal Publish</th>
                                <th>Jurnal Uploaded</th>
                                <th>Skripsi Uploaded</th>
                                <th>Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($major as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <strong>{{ $item->name }} </strong>
                                        <br>Jenjang : <span class="badge bg-label-primary">{{ $item->type }}</span>
                                    </td>
                                    <td>{{ $item->lecturer->title_first }}
                                        {{ $item->lecturer->full_name }},{{ $item->lecturer->title_end }}<br>
                                        <small class="badge bg-label-dark">NIP/NIDN :
                                            {{ $item->lecturer->identity }}</small>
                                    </td>
                                    <td>
                                        @if (App\Models\User::getCountStudents($item->id) != 0)
                                            <strong>{{ App\Models\User::getCountStudents($item->id) }}</strong> Mahasiswa
                                        @else
                                            <span class="badge bg-label-danger">Belum ada mahasiswa</span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $is_published = App\Models\Journal::getJournalPublishedMajor($item->id);
                                            // dd($is_published->count());
                                        @endphp
                                        @if ($is_published->count() <= 0)
                                            <span class="badge bg-label-danger">Belum ada jurnal</span>
                                        @else
                                            <strong>{{ $is_published->count() }}</strong> Jurnal Publish
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $is_uploaded_journal = App\Models\Journal::getAll();
                                            // dd($is_published->count());
                                        @endphp
                                        @if ($is_uploaded_journal->count() <= 0)
                                            <span class="badge bg-label-danger">Belum ada jurnal</span>
                                        @else
                                            <strong>{{ $is_uploaded_journal->count() }}</strong> Jurnal
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $is_uploaded_theses = App\Models\Theses::getThesesMajor($item->id)->count();
                                            // dd($is_published->count());
                                        @endphp
                                        @if ($is_uploaded_theses <= 0)
                                            <span class="badge bg-label-danger">Belum ada Skripsi</span>
                                        @else
                                            <strong>{{ $is_uploaded_theses }}</strong> Skripsi
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#edit-{{ $item->id }}" href=""><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                                            class="bx bx-show me-1"></i> Detail</a>
                                                </div>
                                            </div>
                                            {{-- <form method="POST" action="{{ url('admin/major/destroy', $item->id) }}"
                                                class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn delete-button"><i
                                                        class="bx bx-trash me-1 text-danger"></i>
                                                </button>
                                            </form> --}}
                                        </div>
                                    </td>
                                </tr>
                                @include('admin.major.modal_edit')
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama Jurusan</th>
                                <th>Ketua Jurusan </th>
                                <th>Jumlah Mahasiswa</th>
                                <th>Jurnal Publish</th>
                                <th>Jurnal Uploaded</th>
                                <th>Aksi </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.major.modal_create')
@endsection
@push('js')
    <script type="text/javascript">
        $("#major").addClass("active");
    </script>
@endpush

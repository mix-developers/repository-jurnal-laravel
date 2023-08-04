@extends('layouts.backend.admin')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header flex-column flex-md-row">
                    <div class="head-label ">
                        <h5 class="card-title mb-0">{{ $title }}</h5>
                    </div>
                </div>
                <div class="card-datatable table-responsive">
                    <table id="datatable" class="table table-hover table-bordered">
                        <thead>
                            <tr class="bg-light">
                                <th>#</th>
                                <th>Name</th>
                                <th>NIP/NIDN</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Verifikasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }} </td>
                                    <td>{{ $item->identity }} </td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        <form action="{{ url('/admin/users/verifications', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" value="1" name="is_verified">
                                            <button type="submit" class="btn btn-sm btn-primary"><i
                                                    class="bx bx-check"></i> Varifikasi</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ url('/admin/theses/show', encrypt($item->id)) }}"><i
                                                class="bx bx-show"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>NIP/NIDN</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Verifikasi</th>
                                <th>Aksi</th>
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
        $("#users_lecturers_pending").addClass("active");
    </script>
@endpush

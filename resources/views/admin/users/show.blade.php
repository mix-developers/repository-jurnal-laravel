@push('css')
@endpush
@extends('layouts.backend.admin')
@section('content')
    <div class="row ">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class=" d-flex align-items-center flex-column">
                            <img class="img-fluid rounded my-4"
                                src="{{ $users->avatar != null || $users->avatar != '' ? url(Storage::url($users->avatar)) : asset('/img/user.png') }}"
                                height="110" width="110" alt="User avatar">
                            <div class="user-info text-center">
                                <h4>{{ $users->name }}</h4>
                                <p class="mb-2 text-danger">{{ $users->identity }}</p>
                                <span class="badge bg-label-secondary">{{ $users->role }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Update Profile
                </div>
                <div class="card-body">
                    <form class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"
                        action="{{ url('/admin/updateProfile', $users->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12 fv-plugins-icon-container">
                            <label class="form-label" for="avatar">Pas Foto</label>
                            <input type="file" class="form-control" name="avatar">
                            <span class="text-danger">Ukuran file maksimal 10 mb</span>
                        </div>
                        <div class="col-12 col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="name">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" placeholder="nama lengkap"
                                value="{{ $users->name }}">
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 fv-plugins-icon-container">
                            <label class="form-label"
                                for="identity">{{ $users->role == 'mahasiswa' ? 'NIM' : 'NIP/NIDN/USERNAME' }}</label>
                            <input type="text" name="identity" class="form-control" placeholder="000000000"
                                value="{{ $users->identity }}">
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                        <div class="col-12 fv-plugins-icon-container">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="nama@gmail.com"
                                value="{{ $users->email }}">
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label" for="phone">Nomor HP</label>
                            <input type="text" name="phone" class="form-control modal-edit-tax-id"
                                placeholder="+62xxxxxxxxxxx" value="{{ $users->phone }}">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="id_major">Jurusan</label>
                            <select class="form-control" name="id_major">
                                <option value="">--pilih jurusan--</option>
                                @foreach (App\Models\Major::all() as $item)
                                    <option value="{{ $item->id }}" @if ($users->id_major == $item->id) selected @endif>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        @if (Auth::user()->role == 'admin')
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Simpan Perubahan</button>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $("#profile").addClass("active");
    </script>
@endpush

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
                                src="{{ Auth::user()->avatar != null || Auth::user()->avatar != '' ? url(Storage::url(Auth::user()->avatar)) : asset('/img/user.png') }}"
                                height="110" width="110" alt="User avatar">
                            <div class="user-info text-center">
                                <h4>{{ Auth::user()->name }}</h4>
                                <p class="mb-2 text-danger">{{ Auth::user()->identity }}</p>
                                <span class="badge bg-label-secondary">{{ Auth::user()->role }}</span>
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
                        action="{{ url('/mahasiswa/updateProfile', Auth::user()->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12 fv-plugins-icon-container">
                            <label class="form-label" for="avatar">Pas Foto</label>
                            <input type="file" class="form-control" name="avatar">
                        </div>
                        <div class="col-12 col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="name">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" placeholder="nama lengkap"
                                value="{{ Auth::user()->name }}">
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 fv-plugins-icon-container">
                            <label class="form-label"
                                for="identity">{{ Auth::user()->role == 'mahasiswa' ? 'NIM' : 'NIP/NIDN' }}</label>
                            <input type="text" name="identity" class="form-control" placeholder="000000000"
                                value="{{ Auth::user()->identity }}">
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                        <div class="col-12 fv-plugins-icon-container">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="nama@gmail.com"
                                value="{{ Auth::user()->email }}">
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label" for="phone">Nomor HP</label>
                            <input type="text" name="phone" class="form-control modal-edit-tax-id"
                                placeholder="+62xxxxxxxxxxx" value="{{ Auth::user()->phone }}">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="id_major">Jurusan</label>
                            <select class="form-control" name="id_major">
                                <option value="">--pilih jurusan--</option>
                                @foreach (App\Models\Major::all() as $item)
                                    <option value="{{ $item->id }}" @if (Auth::user()->id_major == $item->id) selected @endif>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Simpan Perubahan</button>
                        </div>
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

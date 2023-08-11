@extends('layouts.frontend.app')

@section('content')
    <!-- Sections:Start -->

    <div data-bs-spy="scroll" class="scrollspy-example">
        @include('pages.component._title')
        <div class="text-center mt-4 container">
            <h5 class="bg-label-primary py-4" style="border-radius: 20px;">Hi! {{ $user->name }} ini informasi akun anda..
            </h5>
        </div>
        <div class="container">
            <div class="row ">
                <div class="col-lg-8 col-md-6">
                    <div class="p-3 border rounded  mb-4">
                        <table class="table table-borderles table-hover">
                            <tr>
                                <td>Nama Lengkap</td>
                                <td><input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                </td>
                            </tr>

                            <tr>
                                @if ($user->role == 'dosen')
                                    <td>NIDN/NIP</td>
                                    <td><input type="text" class="form-control" name="identity"
                                            value="{{ $user->identity }}"></td>
                                @elseif($user->role == 'mahasiswa')
                                    <td>NIM</td>
                                    <td><input type="text" class="form-control" name="identity"
                                            value="{{ $user->identity }}"></td>
                                @else
                                    <td>identitas</td>
                                    <td><input type="text" class="form-control" name="identity"
                                            value="{{ $user->identity }}"></td>
                                @endif
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" class="form-control" name="email" value="{{ $user->email }}">
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor HP</td>
                                <td><input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                                </td>
                            </tr>
                        </table>
                        <div class="mt-3 text-center">
                            <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="p-3 border rounded  mb-4">
                        <table class="table table-borderles table-hover">
                            <tr>
                                <td>Password Baru</td>
                                <td><input type="text" class="form-control" name="password"></td>
                            </tr>
                            <tr>
                                <td>Konfirmasi Password</td>
                                <td><input type="text" class="form-control" name="password_confirmation"></td>
                            </tr>
                        </table>
                        <div class="mt-3 text-center">
                            <button type="submit" class="btn btn-primary">Simpan Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

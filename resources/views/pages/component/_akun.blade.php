<div class="row ">
    <div class="col-lg-8 col-md-6">
        <div class="p-3 border rounded  mb-4">
            <form action="{{ url('/mahasiswa/updateProfile', Auth::user()->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
            </form>
        </div>
    </div>
    <div class="col-lg-4 col-md-4">
        <div class="p-3 border rounded  mb-4">
            <form action="{{ url('/mahasiswa/updatePassword', Auth::user()->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <table class="table table-borderles table-hover">
                    <tr>
                        <td>Password Baru</td>
                        <td><input type="password" class="form-control" name="password"
                                placeholder="Tulis password baru "></td>
                    </tr>
                    <tr>
                        <td>Konfirmasi Password</td>
                        <td><input type="password" id="password-confirm" class="form-control"
                                name="password_confirmation" placeholder="tulis ulang password " required
                                autocomplete="new-password">
                        </td>
                    </tr>
                </table>
                <div class="mt-3 text-center">
                    <button type="submit" class="btn btn-primary">Simpan Password</button>
                </div>
            </form>
        </div>
    </div>
</div>

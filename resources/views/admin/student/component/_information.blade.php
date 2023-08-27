<div class="col-12 mb-3">
    <div class="card">
        <div class="card-header">
            <strong>Identitas Mahasiswa</strong>
        </div>
        <div class="card-body">
            <table class="table table-borderles">
                <tr>
                    <td>Nama Lengkap</td>
                    <td>NIM</td>
                    <td>Nomor HP</td>
                    <td>Email</td>
                </tr>
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->identity }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->email }}</td>
                </tr>
            </table>
        </div>
    </div>

</div>

<div class="card mt-3">
    <div class="card-header">
        Status verifikasi jurnal anda
    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>File halaman pertama</th>
                    <th>File keseluruhan</th>
                    <th>Status verifikasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($files as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal"
                                data-bs-target="#journal-file1-{{ $item->id }}">
                                Lihat
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal"
                                data-bs-target="#journal-file2-{{ $item->id }}">
                                Lihat
                            </button>
                        </td>
                        <td>
                            Tidak diterima
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning mx-3" data-bs-toggle="modal"
                                data-bs-target="#update-{{ $item->id }}">
                                Update
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

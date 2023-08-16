<div class="border mx-2 my-4 p-3 rounded">
    <div class="card-datatable table-responsive">
        <table id="datatable" class="table table-hover table-bordered">
            <thead>
                <tr class="bg-light">
                    <th>#</th>
                    <th>Nama Lengkap</th>
                    <th>NIM</th>
                    <th>Upload Jurnal</th>
                    <th>Upload Skripsi</th>
                    <th>Upload Kelengkapan Berkas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($student as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }} </td>
                        <td>{{ $item->identity }} </td>
                        <td>
                            {!! App\Models\Journal::checkJournalExist($item->id) != 0
                                ? '<span class="badge bg-success">Sudah</span>'
                                : '<span class="badge bg-danger">Belum</span>' !!}
                        </td>
                        <td>
                            {!! App\Models\Theses::checkThesesExist($item->id) != 0
                                ? '<span class="badge bg-success">Sudah</span>'
                                : '<span class="badge bg-danger">Belum</span>' !!}
                        </td>
                        <td>
                            <ol>
                                @forelse (App\Models\AdditionalFile::cekAdditionalFileJurusan($item->id) as $file)
                                    <li>
                                        <a href="{{ url(Storage::url(App\Models\AdditionalFile::getAdditionalFileAdmin($file->id_file_category, $item->id)->file)) }}"
                                            class="text-link" target="__blank">{{ $file->file_category->category }}</a>
                                    </li>
                                @empty
                                    <li class="text-danger">
                                        Belum ada file
                                    </li>
                                @endforelse
                            </ol>
                        </td>

                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>No HP</th>
                </tr>
            </tfoot>
        </table>
        <div class="my-2">
            {{ $student->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</div>

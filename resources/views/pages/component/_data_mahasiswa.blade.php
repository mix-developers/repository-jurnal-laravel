<div class="border mx-2 my-4 p-3 rounded">
    <div class="my-3 input-group input-group-merge">
        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-user"></i></span>
        <input type="search" class="form-control" name="nama" id="filterNama" placeholder="Cari nama dosen disini..">
        <button type="button" class="btn btn-primary" id="btnFilter"><i class="bx bx-search"></i> Filter</button>
        <button type="button" class="btn btn-secondary" id="btnResetFilter"><i class="fa fa-times"></i> Reset
        </button>
    </div>
    <div class="card-datatable table-responsive">
        <table id="datatable" class="table table-hover table-bordered">
            <thead>
                <tr class="bg-light">
                    <th>#</th>
                    <th>Nama Lengkap</th>
                    <th>Pembimbing</th>
                    <th>Penguji</th>
                    <th>Jurnal</th>
                    <th>Skripsi</th>
                    <th>Kelengkapan Berkas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($student as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $item->name }}</strong> <br>{{ $item->identity }}</td>
                        <td>
                            <ol>
                                @forelse (App\Models\Mentor::getMentor($item->id) as $list)
                                    <li>{{ $list->lecturer->title_first }}
                                        {{ $list->lecturer->full_name }} {{ $list->lecturer->title_end }}</li>
                                @empty
                                    <span class="badge bg-label-danger">Belum Memiliki Pembimbing</span>
                                @endforelse
                            </ol>
                        </td>
                        <td>
                            <ol>
                                @forelse (App\Models\Mentor::getMentorTest($item->id) as $list)
                                    <li>{{ $list->lecturer->title_first }}
                                        {{ $list->lecturer->full_name }} {{ $list->lecturer->title_end }}</li>
                                @empty
                                    <span class="badge bg-label-danger">Belum Memiliki Penguji</span>
                                @endforelse
                            </ol>
                        </td>
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

        </table>
        <div class="my-2">
            {{ $student->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</div>
@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#btnFilter').click(function() {
                var nama = $('#filterNama').val().toLowerCase();
                $('#datatable tbody tr').each(function() {
                    var pembimbing = $(this).find('td:nth-child(3)').text().toLowerCase();
                    var penguji = $(this).find('td:nth-child(4)').text().toLowerCase();

                    if (pembimbing.includes(nama) || penguji.includes(nama)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
        $(document).ready(function() {
            $('#datatable').DataTable({
                // responsive: true,
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ ",
                    "zeroRecords": "Maaf belum ada data",
                    "info": "Tampilkan data _PAGE_ dari _PAGES_",
                    "infoEmpty": "belum ada data",
                    "infoFiltered": "(saring from _MAX_ total data)",
                    "search": "Cari : ",
                    "paginate": {
                        "previous": "Sebelumnya ",
                        "next": "Selanjutnya"
                    }
                }

            });
        });
        $('#btnResetFilter').click(function() {
            $('#filterNama').val('');
            $('#datatable tbody tr').show();
        });
    </script>
@endpush

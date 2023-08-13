<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Data Mahasiswa | Repository</title>
    <link rel="stylesheet" href="{{ public_path('backend_theme') }}/assets/pdf/bootstrap.min.css" media="all" />
    <style>
        body {
            font-family: 'times new roman';
            font-size: 12px;
        }
    </style>
</head>

<body>
    <main>
        <table class="table table-borderless" style="font-size: 14px;">
            <tr>
                <td style="width: 20%">
                    <img style="width: 120px;" src="{{ public_path('img') }}/musamus.png">
                </td>
                <td class="text-center" style="width: 80%">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN
                    RISET, DAN TEKNOLOGI<br>
                    UNIVERSITAS MUSAMUS (UNMUS)<br>
                    FAKULTAS TEKNIK<br>
                    <b>JURUSAN SISTEM INFORMASI</b><br>
                    Jl. Kamizaun Mopah Lama Merauke 99600 Telp/Fax (0971) 325923<br>
                    E-mail: si@unmus.ac.id, Website: http://unmus.ac.id
                </td>
                <td style="width: 20%"></td>

            </tr>
        </table>
        <hr style="border: 1px solid black;">
        <div class="my-3">
            <table>
                <tr>
                    <td style="width: 100px;">Laporan</td>
                    <td>:</td>
                    <td>Data Mahasiswa</td>
                </tr>
                <tr>
                    <td>Tanggal cetak</td>
                    <td>:</td>
                    <td>{{ date('d-m-Y') }}</td>
                </tr>
            </table>
        </div>
        <table class="table table-hover table-bordered" style="font-size: 12px;">
            <thead>
                <tr class="bg-primary text-white">
                    <th>#</th>
                    <th>Nama Lengkap</th>
                    <th>NIM</th>
                    <th>Calon Wisuda</th>
                    <th>Upload Jurnal</th>
                    <th>Upload Skripsi</th>
                    <th>Upload Kelengkapan Berkas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr style="min-height: 10px;">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }} </td>
                        <td>{{ $item->identity }} </td>
                        <td>{{ $item->is_graduate == 1 ? 'Calon Wisuda' : 'Belum' }} </td>
                        <td>
                            {!! App\Models\Journal::checkJournalExist($item->id) != 0
                                ? '<span class="text-success">Sudah</span>'
                                : '<span class="text-danger">Belum</span>' !!}
                        </td>
                        <td>
                            {!! App\Models\Theses::checkThesesExist($item->id) != 0
                                ? '<span class="text-success">Sudah</span>'
                                : '<span class="text-danger">Belum</span>' !!}
                        </td>
                        <td>
                            <ol>
                                @forelse (App\Models\AdditionalFile::cekAdditionalFileJurusan($item->id) as $file)
                                    <li>
                                        {{ $file->file_category->category }}
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
    </main>

</body>

</html>

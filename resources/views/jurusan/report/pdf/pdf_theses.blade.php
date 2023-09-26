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

        table.table_custom th,
        table.table_custom td {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid;
            padding: 5px;
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
                    <td>Laporan Periodik Skripsi Sistem Informasi</td>
                </tr>
                <tr>
                    <td>Tanggal cetak</td>
                    <td>:</td>
                    <td>{{ date('d-m-Y') }}</td>
                </tr>
            </table>
        </div>
        <table class="table_custom" style="font-size: 12px;">
            <thead>
                <tr class="bg-primary text-white">
                    <th>#</th>
                    <th>Mahasiswa</th>
                    {{-- <th>Jurusan</th> --}}
                    <th>Judul</th>
                    <th>Pembimbing</th>
                    <th>Penguji</th>
                    {{-- <th>Aksi</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $item->students->name }}</strong><br>
                            <small>{{ $item->students->identity }}</small>
                        </td>
                        {{-- <td>{{ $item->major->name }}</td> --}}
                        <td>
                            <b>{{ Str::limit($item->title, 50) }}</b><br>
                            <span class="badge bg-label-secondary">{{ $item->year }}</span>
                        </td>
                        <td>
                            <ol>
                                @forelse (App\Models\Mentor::getMentor($item->id_user) as $list)
                                    <li>{{ $list->lecturer->title_first }}
                                        {{ $list->lecturer->full_name }} {{ $list->lecturer->title_end }}</li>
                                @empty
                                    <span class="badge bg-label-danger">Belum Memiliki Pembimbing</span>
                                @endforelse
                            </ol>
                        </td>
                        <td>
                            <ol>
                                @forelse (App\Models\Mentor::getMentorTest($item->id_user) as $list)
                                    <li>{{ $list->lecturer->title_first }}
                                        {{ $list->lecturer->full_name }} {{ $list->lecturer->title_end }}</li>
                                @empty
                                    <span class="badge bg-label-danger">Belum Memiliki Penguji</span>
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

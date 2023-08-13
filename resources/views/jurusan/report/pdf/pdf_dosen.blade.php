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
                    <td>Data Skripsi</td>
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
                    <th>NIP / NIDN</th>
                    <th>Nama Lengkap </th>
                    <th>Jurusan</th>
                    <th>No HP</th>
                    <th>Bimbingan</th>
                    <th>Menguji</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    @php
                        $mentor = App\Models\Mentor::getMentorLecturer($item->id);
                        $mentor_test = App\Models\Mentor::getMentorLecturerTest($item->id);
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->identity }}</td>
                        <td>{{ $item->title_first }} {{ $item->full_name }},{{ $item->title_end }}</td>
                        <td>{{ $item->major->name }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>
                            @if ($mentor->count() != 0)
                                {{ $mentor->count() }} Mahasiswa
                            @else
                                <span class="badge bg-label-danger">Belum ada bimbingan</span>
                            @endif
                        </td>
                        <td>
                            @if ($mentor_test->count() != 0)
                                {{ $mentor_test->count() }} Mahasiswa
                            @else
                                <span class="badge bg-label-danger">Belum menguji</span>
                            @endif
                        </td>
                @endforeach
            </tbody>
        </table>
    </main>

</body>

</html>

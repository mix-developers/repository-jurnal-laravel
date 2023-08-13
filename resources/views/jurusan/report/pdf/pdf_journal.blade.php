<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Jurnal | Repository</title>
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
                    <td>Jurnal</td>
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
                    <th>No</th>
                    <th>Nama Lengkap </th>
                    <th>Judul</th>
                    <th>Dosen Pembimbing</th>
                    <th>Status</th>
                    {{-- <th>Lihat</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    @php
                        $status_journal = App\Models\JournalStatus::where('id_journal', $item->id)
                            ->latest()
                            ->first();
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $item->students->name }}</strong><br>{{ $item->students->identity }}</td>
                        <td>
                            <strong>{{ Str::limit($item->title, 50) }}</strong><br>
                            <small>Kata Kunci : {{ Str::limit($item->keywoards, 100) }}</small>
                        </td>
                        <td>
                            <ol>
                                @forelse (App\Models\Mentor::getMentor($item->id_user) as $list)
                                    <li>{{ $list->lecturer->title_first }}
                                        {{ $list->lecturer->full_name }} {{ $list->lecturer->title_end }}</li>
                                @empty
                                    <span class="badge bg-label-danger">Belum ada kontributor</span>
                                @endforelse
                            </ol>
                        </td>
                        <td>
                            <span
                                class="badge @if ($status_journal->id_status <= 2) bg-label-warning @elseif($status_journal->id_status == 3) bg-label-danger @else bg-label-primary @endif">{{ $status_journal->statuses->status }}</span>
                        </td>
                        {{-- <td>
                            @if (App\Models\JournalStatus::checkJournal($item->id) <= 0)
                                <form action="{{ url('/admin/journal/check') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $item->id }}" name="id_journal">
                                    <button type="submit" class="btn btn-primary"><i
                                            class="bx bx-show me-1"></i>Lihat</button>
                                </form>
                            @else
                                <a href="{{ url('/admin/journal/show', $item->id) }}"
                                    class="btn btn-primary"><i class="bx bx-show me-1"></i>Lihat</a>
                            @endif
                        </td> --}}
                        {{-- <td>
                            <div class="d-flex align-items-center">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ url('/admin/journal/show', encrypt($item->id)) }}"><i
                                                class="bx bx-show me-1"></i> Detail</a>
                                    </div>
                                </div>

                            </div>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>

        </table>
    </main>

</body>

</html>

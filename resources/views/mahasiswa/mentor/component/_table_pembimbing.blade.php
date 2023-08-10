<div class="my-3">
    <form action="{{ url('/mahasiswa/mentor/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <input type="hidden" value="pembimbing" name="type">
            <select class="form-select" id="id_lecturer" name="id_lecturer" aria-label="Example select with button addon">
                <option selected="">Pilih...</option>
                @foreach ($lecturer as $item)
                    <option value="{{ $item->id }}">{{ $item->title_first }}
                        {{ $item->full_name }}{{ $item->title_end }}</option>
                @endforeach
            </select>

            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </form>
</div>
<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pembimbing</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pembimbing as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <strong>{{ $item->lecturer->title_first }}
                            {{ $item->lecturer->full_name }}{{ $item->lecturer->title_end }}</strong>
                        <br>
                        {{ $item->lecturer->identity }}
                    </td>
                    <td>
                        <form method="POST" action="{{ url('mahasiswa/mentor/destroy', $item->id) }}"
                            class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn delete-button"><i
                                    class="bx bx-trash me-1 text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada pembimbing</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

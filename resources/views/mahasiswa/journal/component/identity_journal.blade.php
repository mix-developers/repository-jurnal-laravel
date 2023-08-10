<div class="card">
    <form action="{{ url('/mahasiswa/journal/update', $journal->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-header">
            Identitas jurnal
        </div>
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <td>
                        <strong> Judul </strong>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Judul jurnal.." aria-describedby="defaultFormControlHelp"
                            value="{{ $journal->title }}" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Kata Kunci</strong>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="keywoards" name="keywoards"
                            placeholder="kata kunci.." aria-describedby="defaultFormControlHelp"
                            value="{{ $journal->keywoards }}" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Abstrak</strong>
                    </td>
                    <td>
                        <textarea id="editor" class="form-control " name="abstract" rows="10" cols="50">{{ $journal->abstract }}</textarea>
                    </td>
                </tr>
            </table>
        </div>
        @if (Auth::user()->role == 'mahasiswa')
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        @endif
    </form>
</div>

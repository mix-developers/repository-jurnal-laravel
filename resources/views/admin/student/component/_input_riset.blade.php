<div class="container text-center my-3">
    <div class="card @if ($student->id_riset == 0) bg-warning @else bg-primary @endif">
        <div class="card-body py-4">
            @if ($student->id_riset == 0)
                <i class='bx bx-lg bx-error-circle bx-tada bx-flip-vertical text-white'></i>
                <h3 class="text-white py-2">Input bidang riset..
                </h3>
            @else
                <i class='bx bx-lg bx-check bx-tada bx-flip-vertical text-white'></i>
                <h3 class="text-white py-2">Perbarui bidang riset
                </h3>
            @endif
            <form action="{{ url('/admin/updateProfile', $student->id) }}" class="form-inline" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="input-group mb-3">
                    <select class="form-select" id="id_riset" name="id_riset"
                        aria-label="Example select with button addon">
                        <option selected="0">Pilih...</option>
                        @foreach (App\Models\Riset::all() as $item)
                            <option value="{{ $item->id }}" @if ($student->id_riset == $item->id) selected @endif>
                                {{ $item->riset }}</option>
                        @endforeach
                    </select>
                    @if (Auth::user()->role == 'admin')
                        <button class="btn btn-light" type="submit">
                            @if ($student->id_riset == 0)
                                Simpan
                            @else
                                Perbarui
                            @endif
                        </button>
                    @endif

                </div>
            </form>
        </div>
    </div>
</div>

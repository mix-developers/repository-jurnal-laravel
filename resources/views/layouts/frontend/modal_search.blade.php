<div class="modal fade" id="search" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg align-center" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Search</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/search') }}" method="GET">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-10 p-2">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text" id="basic-addon-search31"><i
                                        class="bx bx-search"></i></span>
                                <input type="search" class="form-control" placeholder="masukan kata kunci pencarian.."
                                    aria-label="masukan kata kunci pencarian.." aria-describedby="basic-addon-search31"
                                    name="keywoard" value="{{ old('keywoard') }}">
                            </div>
                        </div>
                        <div class="col-lg-2 p-2">
                            <select class=" form-control " name="type">
                                <option value="journal" {{ old('type') == 'journal' ? 'selected' : '' }}>Jurnal</option>
                                <option value="theses" {{ old('type') == 'theses' ? 'selected' : '' }}>Skripsi</option>
                                <option value="lecturer" {{ old('type') == 'lecturer' ? 'selected' : '' }}>Dosen
                                </option>
                            </select>
                        </div>
                        <div class="col-lg-3 p-2">
                            <select class=" form-control " name="id_riset">
                                <option value="" {{ old('id_riset') == '' ? 'selected' : '' }}>Semua Bidang Riset
                                </option>
                                @foreach (App\Models\Riset::all() as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('id_riset') == $item->id ? 'selected' : '' }}>{{ $item->riset }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 p-2">
                            <select class=" form-control " name="periode">
                                <option value="" {{ old('periode') == '' ? 'selected' : '' }}>Semua Periode
                                </option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ old('periode') == $i ? 'selected' : '' }}>
                                        {{ $i }}
                                        Tahun Terakhir
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-lg-6 p-2">
                            <div class="input-group input-group-merge">
                                <input type="date" class="form-control" placeholder="Dari" name="from_date"
                                    value="{{ old('from_date') }}">
                                <span class="input-group-text" id="basic-addon-search31">Sampai</span>
                                <input type="date" class="form-control" placeholder="Sampai" name="to_date"
                                    value="{{ old('to_date') }}">
                            </div>
                        </div>

                    </div>
                    <div class="row">

                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn btn-primary " type="submit"><i class="bx bx-search"></i><span
                            class="d-none d-md-block"> Cari</span></button>
                </div>
            </form>
        </div>
    </div>
</div>

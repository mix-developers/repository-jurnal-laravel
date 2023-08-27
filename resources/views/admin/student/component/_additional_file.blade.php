@if (Auth::user()->role == 'admin')
    <table class="table table-borderles">
        @forelse ($file_category as $file)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <strong>{{ $file->category }}</strong><br>
                    <small>{!! $file->is_required == 1 ? '<span class="text-danger">Wajib diupload</span>' : 'tidak wajib diupload' !!}</small>
                </td>
                <td>
                    @if (App\Models\AdditionalFile::cekAdditionalFileAdmin($file->id, $student->id) != 0)
                        <a href="{{ url(Storage::url(App\Models\AdditionalFile::getAdditionalFileAdmin($file->id, $student->id)->file)) }}"
                            target="__blank" class="btn btn-primary">Lihat</a>
                    @else
                        <span class="badge bg-danger">{{ __('File tidak tersedia') }}</span>
                    @endif
                </td>
                <td>
                    @if (App\Models\AdditionalFile::cekAdditionalFileAdmin($file->id, $student->id) != 0)
                        <button type="button" class="btn btn-warning mx-2" data-bs-toggle="modal"
                            data-bs-target="#additional-{{ $file->id }}">
                            Update
                        </button>
                    @else
                        <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal"
                            data-bs-target="#additional-add-{{ $file->id }}">
                            Upload
                        </button>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-center">Belum ada data</td>
            </tr>
        @endforelse
    </table>
@else
    <table class="table table-borderles">
        @foreach ($file_category as $file)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <strong>{{ $file->category }}</strong><br>
                    <small>{!! $file->is_required == 1 ? '<span class="text-danger">Wajib diupload</span>' : 'tidak wajib diupload' !!}</small>
                </td>
                <td>
                    @if (App\Models\AdditionalFile::cekAdditionalFileAdmin($file->id, $student->id) != 0)
                        <a href="{{ url(Storage::url(App\Models\AdditionalFile::getAdditionalFileAdmin($file->id, $student->id)->file)) }}"
                            target="__blank" class="btn btn-primary">Lihat</a>
                    @else
                        <span class="badge bg-danger">{{ __('File tidak tersedia') }}</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@endif

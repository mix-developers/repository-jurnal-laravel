@foreach (App\Models\Lecturer::all() as $item)
    <div class="modal fade" id="lecturer-{{ $item->id }}" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Data Bimbingan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        @forelse(App\Models\Mentor::getMentorLecturer($item->id) as $item)
                            @php
                                $journal = App\Models\Journal::with(['students', 'major'])
                                    ->where('id_user', $item->id_user)
                                    ->first();
                                
                                $journal_file = null;
                                $theses = null;
                                
                                if ($journal) {
                                    $journal_file = App\Models\JournalFile::getJournal($journal->id)->file;
                                }
                                
                                $latest_thesis = App\Models\Theses::with(['students', 'major'])
                                    ->where('id_user', $item->id_user)
                                    ->latest()
                                    ->first();
                                
                                if ($latest_thesis) {
                                    $theses = $latest_thesis->file;
                                }
                            @endphp
                            <tr>
                                <td>{{ $item->user->name }}</td>
                                <td>
                                    @if ($journal_file)
                                        <a href="{{ url(Storage::url($journal_file)) }}" class="btn btn-primary"
                                            target="__blank">Jurnal</a>
                                    @else
                                        <span class="text-muted">Tidak ada jurnal</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($theses)
                                        <a href="{{ url(Storage::url($theses)) }}" class="btn btn-primary"
                                            target="__blank">Skripsi</a>
                                    @else
                                        <span class="text-muted">Tidak ada skripsi</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Belum Ada Bimbingan</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
@endforeach

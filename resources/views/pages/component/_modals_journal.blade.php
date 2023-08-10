@foreach (App\Models\Journal::getAll() as $item)
    <div class="modal fade" id="journal-{{ $item->id }}" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">{{ $item->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (Auth::check())
                        <embed id="myFrame" type="application/pdf"
                            src="{{ url(Storage::url(App\Models\JournalFile::getJournal($item->id)->file2)) }}"
                            width="100%" height="500"></embed>
                    @else
                        <embed id="myFrame" type="application/pdf"
                            src="{{ url(Storage::url(App\Models\JournalFile::getJournal($item->id)->file)) }}"
                            width="100%" height="500"></embed>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    @if (Auth::check())
                        <a href="{{ url('/download_theses', $item->id) }}" class="btn btn-primary">Download file</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach

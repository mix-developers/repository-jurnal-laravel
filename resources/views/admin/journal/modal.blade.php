<!-- Modal publish-->
<div class="modal fade" id="publish" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle"> {{ $journal->is_published == 0 ? 'Publish' : 'Reject' }}
                    Journal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/admin/journal/publish', $journal->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if ($journal->is_published == 0)
                        <div class="mb-3">
                            <label>Link Doi</label>
                            <textarea class="form-control " name="link_doi" rows="2" cols="10" placeholder="tulis link doi di sini...."
                                required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="bx bx-check me-1"></i>Publish</button>
                    @else
                        <button type="submit" class="btn btn-danger"><i class="bx bx-x me-1"></i>Reject</button>
                    @endif
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="accept" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Accpet Journal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/admin/journal/accept') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <textarea class="form-control " name="message" rows="2" cols="10"
                        placeholder="tulis catatan anda di sini...."></textarea>
                    <input type="hidden" value="{{ $journal->id }}" name="id_journal">
                    <button type="submit" class="btn btn-success btn-lg mx-2 mt-4">Accept Journal</button>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="reject" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Reject Journal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/admin/journal/reject') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <textarea class="form-control " name="message" rows="2" cols="10"
                        placeholder="tulis catatan anda di sini...."></textarea>
                    <input type="hidden" value="{{ $journal->id }}" name="id_journal">
                    <button type="submit" class="btn btn-danger btn-lg mt-4">Reject Journal</button>
                </form>
            </div>

        </div>
    </div>
</div>

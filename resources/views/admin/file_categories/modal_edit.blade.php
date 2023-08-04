 <!-- Modal -->
 <div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <form action="{{ url('/admin/file_categories/update', $item->id) }}" method="POST">
                 @csrf
                 @method('PUT')
                 <div class="modal-header">
                     <h5 class="modal-title" id="modalCenterTitle">Edit Data : {{ $item->identity }}</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <form method="POST" action="{{ url('admin/file_categories/update', $item->id) }}"
                         enctype="multipart/form-data">
                         @csrf
                         <div class="col mb-3">
                             <label for="category" class="form-label">Jenis File</label>
                             <input type="text" id="category" name="category" class="form-control"
                                 placeholder="Jenis" value="{{ $item->category }}" />
                         </div>
                         <div class="col mb-3">
                             <input type="checkbox" name="is_required" value="1"
                                 @if ($item->is_required == 1) checked @endif>
                             <label for="is_required" class="form-label">Required ?</label>
                         </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                         Close
                     </button>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 </div>

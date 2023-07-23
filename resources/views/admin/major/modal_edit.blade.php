 <!-- Modal -->
 <div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalCenterTitle">Edit Data : {{ $item->identity }}</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="{{ url('/admin/major/update', $item->id) }}" method="POST">
                 @csrf
                 @method('PUT')
                 <div class="modal-body">
                     <div class="row">
                         <div class="col mb-3">
                             <label for="name" class="form-label">Nama Jurusan</label>
                             <input type="text" id="name" name="name" class="form-control"
                                 placeholder="Masukkan Nama Jurusan" value="{{ $item->name }}" />
                         </div>
                     </div>
                     <div class="row g-2">
                         <div class="col-8 mb-0">
                             <label for="id_lecturer_leader" class="form-label">Ketua Jurusan</label>
                             <select class="form-select" id="id_lecturer_leader" name="id_lecturer_leader"
                                 aria-label="id_lecturer_leader">
                                 <option value="" selected>--pilih--</option>
                                 @foreach ($lecturer as $list)
                                     <option value="{{ $list->id }}"
                                         @if ($list->id == $item->id_lecturer_leader) selected @endif>
                                         {{ $list->full_name }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="col-4 mb-0">
                             <label for="type" class="form-label">Jenjang</label>
                             <select class="form-select" id="type" name="type" aria-label="type">
                                 <option value="" selected>--pilih--</option>
                                 <option value="S1" @if ($item->type == 'S1') selected @endif>S1</option>
                                 <option value="S2" @if ($item->type == 'S2') selected @endif>S2</option>
                                 <option value="S3" @if ($item->type == 'S3') selected @endif>S3</option>
                                 <option value="D3" @if ($item->type == 'D3') selected @endif>D3</option>
                                 <option value="D4" @if ($item->type == 'D4') selected @endif>D4</option>
                             </select>
                         </div>
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

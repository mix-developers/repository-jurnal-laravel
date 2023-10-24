 <!-- Modal -->
 <div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalCenterTitle">Edit Data : {{ $item->identity }}</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form method="POST" action="{{ url('admin/lecturer/update', $item->id) }}" enctype="multipart/form-data">
                 @csrf
                 @method('PUT')
                 <div class="modal-body">
                     <div class="row">
                         <div class="col mb-3">
                             <label for="identity" class="form-label">NIP/NIDN</label>
                             <input type="text" id="identity" name="identity" class="form-control"
                                 placeholder="NIP/NIDN" value="{{ $item->identity }}" />
                         </div>
                         <div class="col mb-3">
                             <label for="id_major" class="form-label">Jurusan</label>
                             <select class="form-select" id="id_major" name="id_major" aria-label="Jurusan">
                                 <option value="" selected>--pilih--</option>
                                 @foreach ($major as $list)
                                     <option value="{{ $list->id }}"
                                         @if ($list->id == $item->id_major) selected @endif>{{ $list->name }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="col mb-3">
                             <label for="id_riset" class="form-label">Bidang Riset</label>
                             <select class="form-select" id="id_riset" name="id_riset" aria-label="Jurusan">
                                 <option value="" selected>--pilih--</option>
                                 @foreach (App\Models\Riset::all() as $list)
                                     <option value="{{ $list->id }}"
                                         @if ($list->id == $item->id_riset) selected @endif>{{ $list->riset }}
                                     </option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                     <div class="row g-2">
                         <div class="col-md-2 mb-3">
                             <label for="title_first" class="form-label">Title Depan <small>(opsional)</small></label>
                             <input type="text" id="title_first" name="title_first" class="form-control"
                                 placeholder="" value="{{ $item->title_first }}" />
                         </div>
                         <div class="col-md-7 mb-3">
                             <label for="full_name" class="form-label">Nama Lengkap</label>
                             <input type="text" id="full_name" name="full_name" class="form-control"
                                 placeholder="Masukkan Nama" value="{{ $item->full_name }}" />
                         </div>
                         <div class="col-md-3 mb-3">
                             <label for="title_end" class="form-label">Title Belakang</label>
                             <input type="text" id="title_end" name="title_end" class="form-control" placeholder=""
                                 value="{{ $item->title_end }}" />
                         </div>
                     </div>
                     <div class="row g-2">
                         <div class="col mb-3">
                             <label for="phone" class="form-label">Nomor HP</label>
                             <input type="text" id="phone" name="phone" class="form-control"
                                 placeholder="Nomor HP" value="{{ $item->phone }}" />
                         </div>
                         <div class="col mb-3">
                             <label for="address" class="form-label">Alamat</label>
                             <input type="text" id="address" name="address" class="form-control"
                                 placeholder="Alamat" value="{{ $item->address }}" />
                         </div>
                     </div>
                     <div class="row g-2">
                         <div class="col mb-3">
                             <label for="place_bird" class="form-label">Tempat Lahir</label>
                             <input type="text" id="place_bird" name="place_bird" class="form-control"
                                 placeholder="Tempat Lahir" value="{{ $item->place_birth }}" />
                         </div>
                         <div class="col mb-3">
                             <label for="date_birth" class="form-label">Tanggal Lahir</label>
                             <input type="date" id="date_birth" name="date_birth" class="form-control"
                                 placeholder="Tanggal Lahir" value="{{ $item->date_birth }}" />
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

 <!-- Modal -->
 <div class="modal fade" id="create" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalCenterTitle">Tambah Data Dosen</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form method="POST" action="{{ url('admin/student/store') }}" enctype="multipart/form-data">
                 @csrf
                 <div class="modal-body">
                     <div class="row">
                         <div class="col mb-3">
                             <label for="identity" class="form-label">NIM</label>
                             <input type="text" id="identity" name="identity" class="form-control"
                                 placeholder="NIM" />
                         </div>
                         <div class="col mb-3">
                             <label for="id_major" class="form-label">Jurusan</label>
                             <select class="form-select" id="id_major" name="id_major" aria-label="Jurusan">
                                 <option value="" selected>--pilih--</option>
                                 @foreach ($major as $item)
                                     <option value="{{ $item->id }}">{{ $item->name }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                     <div class="row g-2">

                         <div class="col mb-3">
                             <label for="full_name" class="form-label">Nama Lengkap</label>
                             <input type="text" id="full_name" name="full_name" class="form-control"
                                 placeholder="Masukkan Nama" />
                         </div>
                         <div class="col mb-3">
                             <label for="phone" class="form-label">Nomor HP</label>
                             <input type="text" id="phone" name="phone" class="form-control"
                                 placeholder="Nomor HP" />
                         </div>

                     </div>
                     <div class="row g-2">

                         <div class="col mb-3">
                             <label for="address" class="form-label">Alamat</label>
                             <input type="text" id="address" name="address" class="form-control"
                                 placeholder="Alamat" />
                         </div>

                     </div>
                     <div class="row g-2">
                         <div class="col mb-3">
                             <label for="place_bird" class="form-label">Tempat Lahir</label>
                             <input type="text" id="place_bird" name="place_bird" class="form-control"
                                 placeholder="Tempat Lahir" />
                         </div>
                         <div class="col mb-3">
                             <label for="date_bird" class="form-label">Tanggal Lahir</label>
                             <input type="date" id="date_bird" name="date_bird" class="form-control"
                                 placeholder="Tanggal Lahir" />
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

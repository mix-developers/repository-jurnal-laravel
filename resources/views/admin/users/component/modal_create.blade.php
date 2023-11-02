 <!-- Modal -->
 <div class="modal fade" id="create" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalCenterTitle">Tambah Data Admin</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form method="POST" action="{{ url('admin/users/store') }}" enctype="multipart/form-data">
                 @csrf
                 <div class="modal-body">
                     <div class="alert alert-primary" role="alert">
                         Password default : <b>admin</b>
                     </div>
                     <input type="hidden" name="password" value="admin">
                     <input type="hidden" name="role" value="admin">
                     <input type="hidden" name="is_verified" value="1">
                     <div class="mb-3">
                         <label for="avatar" class="form-label">Foto</label>
                         <input type="file" id="avatar" name="avatar" class="form-control" />
                         <span class="text-danger">Ukuran file maksimal 10 mb</span>
                     </div>
                     <div class="row">
                         <div class="col mb-3">
                             <label for="identity" class="form-label">NIP/NIDN/ USERNAME</label>
                             <input type="text" id="identity" name="identity" class="form-control"
                                 placeholder="NIP/NIDN/USERNAME" />
                         </div>
                         <div class="col mb-3">
                             <label for="id_major" class="form-label">Jurusan</label>
                             <select class="form-select" id="id_major" name="id_major" aria-label="Jurusan">
                                 <option value="" selected>--pilih--</option>
                                 @foreach (App\Models\Major::all() as $item)
                                     <option value="{{ $item->id }}">{{ $item->name }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                     <div class="row g-2">
                         <div class="col-12 mb-3">
                             <label for="name" class="form-label">Nama Lengkap</label>
                             <input type="text" id="name" name="name" class="form-control"
                                 placeholder="Masukkan Nama" />
                         </div>
                     </div>
                     <div class="row g-2">
                         <div class="col mb-3">
                             <label for="phone" class="form-label">Nomor HP</label>
                             <input type="text" id="phone" name="phone" class="form-control"
                                 placeholder="Nomor HP" />
                         </div>
                         <div class="col mb-3">
                             <label for="email" class="form-label">Email</label>
                             <input type="email" id="email" name="email" class="form-control"
                                 placeholder="Email" />
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

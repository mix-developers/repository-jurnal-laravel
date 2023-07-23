<div class="card mt-3">
    <div class="card-header">
        <h5>Form pengajuan jurnal</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <p class="bg-info text-center p-2 text-white">
                <strong>Identitas jurnal</strong>
            </p>
            <div class="col-6">
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Judul jurnal.."
                        aria-describedby="defaultFormControlHelp" />
                    <div id="defaultFormControlHelp" class="form-text">masukkan judul dari jurnal</div>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="subtitle" class="form-label">subtitle</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle"
                        placeholder="subtitle jurnal.." aria-describedby="defaultFormControlHelp" />
                    <div id="defaultFormControlHelp" class="form-text">masukkan subtitle dari jurnal</div>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="keywoards" class="form-label">kata kunci</label>
                    <input type="text" class="form-control" id="keywoards" name="keywoards"
                        placeholder="kata kunci jurnal.." aria-describedby="defaultFormControlHelp" />
                    <div id="defaultFormControlHelp" class="form-text">masukkan kata kunci dari jurnal</div>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="abstract" class="form-label">Abstrak</label>
                    <textarea id="editor" class="form-control " name="abstract" rows="10" cols="50"></textarea>
                    <div id="defaultFormControlHelp" class="form-text">masukkan abstrak dari jurnal</div>
                </div>
            </div>
            <p class="bg-info text-center p-2 text-white">
                <strong>Upload jurnal</strong>
            </p>
            <div class="col-12">
                <div class="mb-3">
                    <label for="abstract" class="form-label">File jurnal</label>
                    <input type="file" class="form-control" name="file">
                    <div id="defaultFormControlHelp" class="form-text">masukkan file dari jurnal</div>
                </div>
            </div>
            <p class="bg-info text-center p-2 text-white">
                <strong>Contributors jurnal</strong>
            </p>
            <div class="form-control">
                <div class="col-12 ">
                    @include('mahasiswa.journal.component._form_contributors')
                </div>
            </div>
            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-lg btn-primary">Submit jurnal</button>
            </div>
        </div>
    </div>
</div>

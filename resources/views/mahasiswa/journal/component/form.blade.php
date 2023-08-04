<div class="card">
    <div class="card-header">
        Upload Jurnal
    </div>
    <div class="card-body">
        <div class="row">
            <form action="{{ url('mahasiswa/journal/store') }}" enctype="multipart/form-data" method="POST">
                @csrf

                <p class="bg-info text-center p-2 text-white">
                    <strong>Identitas jurnal</strong>
                </p>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Judul jurnal.." aria-describedby="defaultFormControlHelp" />
                        <div id="defaultFormControlHelp" class="form-text">masukkan judul dari jurnal</div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="keywoards" class="form-label">kata kunci <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="keywoards" name="keywoards"
                            placeholder="kata kunci jurnal.." aria-describedby="defaultFormControlHelp" />
                        <div id="defaultFormControlHelp" class="form-text">masukkan kata kunci dari jurnal</div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="abstract" class="form-label">Abstrak <span class="text-danger">*</span></label>
                        <textarea id="editor" class="form-control " name="abstract" rows="10" cols="50"></textarea>
                        <div id="defaultFormControlHelp" class="form-text">masukkan abstrak dari jurnal</div>
                    </div>
                </div>
                <p class="bg-info text-center p-2 text-white">
                    <strong>Upload jurnal</strong>
                </p>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="abstract" class="form-label">File jurnal halaman pertama <span
                                class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="file">
                        <div id="defaultFormControlHelp" class="form-text">masukkan file jurnal halaman pertama</div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="abstract" class="form-label">File jurnal keseluruhan <span
                                class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="file2">
                        <div id="defaultFormControlHelp" class="form-text">masukkan file jurnal keseluruhan</div>
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-lg btn-primary">Submit jurnal</button>
                </div>
            </form>
        </div>
    </div>
</div>

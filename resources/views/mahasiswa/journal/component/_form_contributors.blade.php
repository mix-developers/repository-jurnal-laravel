<div class="form-group clone align-items-center">
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="name_contributors" class="form-label">Nama Lengkap</label>
                <input class="form-control " name="name_contributors[]" />
                <div id="defaultFormControlHelp" class="form-text">masukkan nama lengkap contributor</div>
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="email_contributors" class="form-label">Email</label>
                <input class="form-control " name="email_contributors[]" />
                <div id="defaultFormControlHelp" class="form-text">masukkan email contributor</div>
            </div>
        </div>
        <div class="col-12 mb-4 mx-2 d-flex align-items-center">
            <div class="form-check mx-4">
                <input class="form-check-input" type="checkbox" value="1" name="role" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Pemilik jurnal
                </label>
            </div>
            <div class="form-check ">
                <input class="form-check-input" type="checkbox" value="1" name="role" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Kontak Utama
                </label>
            </div>
        </div>
    </div>
    <div class="btn add btn-success mx-3" data-text="Hapus" data-toggle-class="remove-field">Tambah
    </div>
    <hr>
</div>

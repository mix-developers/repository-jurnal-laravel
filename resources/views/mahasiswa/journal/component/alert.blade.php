@if ($journal == null)
    <div class="alert alert-danger alert-dismissible" role="alert">
        Anda belum melakukan upload jurnal, silahkan melakukan upload
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@else
    @if (App\Models\JournalStatus::notifikasi()->id_status < 4)
        <div class="alert alert-warning alert-dismissible" role="alert">
            Jurnal anda sedang dalam tahap {{ App\Models\JournalStatus::notifikasi()->statuses->status }},Mohon tunggu
            hingga terverifikasi...
        </div>
    @else
        <div class="alert alert-success alert-dismissible" role="alert">
            Selamat, Journal anda telah terverifikasi..
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif
@endif

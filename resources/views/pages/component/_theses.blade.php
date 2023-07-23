<section id="landingFeatures" class="section-py landing-features ">
    <div class="container">
        <div class="text-center mb-3 pb-1">
            <span class="badge bg-label-primary">Skripsi</span>
        </div>
        <h3 class="text-center mb-4">
            <span class="section-title">Skirpsi terbaru</span>
        </h3>
        <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5 justify-content-center">
            @foreach (App\Models\Theses::getFront() as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="card bg-light"
                        style="box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
                        <div class="card-header ">
                            <p><mark>{{ $item->title }}</mark></p>
                            <small>Tahun terbit : {{ $item->year }}</small>
                        </div>
                        <div class="card-body text-center">
                            <img src="{{ asset('/img/skripsi.jpg') }}" width="100%" class="card-img">

                            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                                data-bs-target="#theses-{{ $item->id }}">
                                Buka
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Useful features: End -->

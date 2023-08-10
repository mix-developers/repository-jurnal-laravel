<section id="landingFeatures" class="section-py landing-features">
    <div class="container">
        <div class="text-center mb-3 pb-1">
            <span class="badge bg-label-primary">Skripsi</span>
        </div>

        <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5 justify-content-center">
            @forelse ($theses->take(4) as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="card bg-light"
                        style="box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">

                        <div class="card-body text-center">
                            <h3>{{ $item->title }}</h3>
                            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                                data-bs-target="#theses-{{ $item->id }}">
                                Buka
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center">
                        <h4 class="text-muted">Skripsi not found</h4>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

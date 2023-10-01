<section id="landingFeatures" class="section-py landing-features">
    <div class="container">
        <div class="text-center mb-3 pb-1">
            <span class="badge bg-label-primary">Skripsi</span>
        </div>

        <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5 justify-content-center">
            @forelse ($theses as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="card bg-light border border-primary">

                        <div class="card-body text-center">
                            <h3>{{ Str::limit($item->title, 50) }}</h3>
                            <span class="text-muted">Skripsi | {{ $item->created_at->year }}</span>
                            <br>
                            <span class="text-primary">{{ $item->students->name }}</span>
                            <br>
                            <span class="text-muted">{{ $item->students->identity }}</span><br>
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
            <div class="mt-3">
                {{ $theses->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</section>

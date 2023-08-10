<section id="landingFeatures" class="section-py landing-features" style="border-radius: 50px 50px 0px 0px;">
    <div class="container">
        <div class="text-center mb-3 pb-1">
            <span class="badge bg-label-primary">Jurnal</span>
        </div>

        <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5 justify-content-center">
            @forelse ($journal->take(4) as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="card bg-light border border-primary">
                        <div class="card-header text-center">
                            <h4 class="text-primary m-0">{{ $item->title }}</h4>
                        </div>
                        <div class="card-body text-center">
                            <small class="text-muted ">Jurnal | {{ $item->created_at->year }}</small><br>
                            <p><b>Kata Kunci :</b><br><em>{{ Str::limit($item->keywoards, 100) }}</em></p>
                            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                                data-bs-target="#journal-{{ $item->id }}">
                                Buka
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center">
                        <h4 class="text-muted">Jurnal not found</h4>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

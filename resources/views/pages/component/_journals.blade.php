<section id="landingFeatures" class="section-py landing-features" style="border-radius: 50px 50px 0px 0px;">
    <div class="container">
        <div class="text-center mb-3 pb-1">
            <h1 class="badge bg-label-primary " style="--bs-badge-font-size: 20px;">Jurnal</span>
        </div>

        <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5 justify-content-center">
            @forelse ($journal as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="card bg-light border border-primary">
                        <div class="card-header text-center">
                            <h5 class="text-primary m-0">{{ $item->title }}</h5>
                        </div>
                        <div class="card-body text-center">
                            <small class="text-muted ">Jurnal | {{ $item->created_at->year }}</small><br>
                            <p><b>Kata Kunci :</b><br><em>{{ Str::limit($item->keywoards, 100) }}</em></p>
                            @if ($item->is_published == 1)
                                <div class="my-2">
                                    <a href="{{ $item->link_doi }}"> <span class="badge bg-label-primary">Published <i
                                                class="bx bx-xs bx-link"></i></span></a>
                                    <br>
                                </div>
                            @endif
                            <button type="button" class="btn btn-primary mt-2 float-bottom" data-bs-toggle="modal"
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
            @if (request()->is('journal'))
                <div class="mt-3">
                    {{ $journal->links('vendor.pagination.bootstrap-4') }}
                </div>
            @endif
        </div>
    </div>
</section>

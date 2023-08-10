<div class="container mb-4">
    <table class="table table-borderless table-hover">
        @foreach ($journal as $j)
            <tr>
                <td>
                    <a href="#" class="text-link" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                        data-bs-custom-class="tooltip-dark"
                        title="{{ $j->title }}"><strong>{{ Str::limit($j->title, 100) }}</strong></a>
                    <br><small class="text-muted"><b>Kata kunci :</b> {{ Str::limit($j->keywoards, 100) }}</small><br>
                    <small class="text-muted"><b>Penguji :</b>
                        @foreach (App\Models\Mentor::getMentorsGuide($j->id_user) as $item)
                            {{ $item->lecturer->title_first }}
                            {{ $item->lecturer->full_name }}{{ $item->lecturer->title_end }},
                        @endforeach
                    </small><br>
                    <small class="text-muted"><b>Pembimbing :</b>
                        @foreach (App\Models\Mentor::getMentorsTest($j->id_user) as $item)
                            {{ $item->lecturer->title_first }}
                            {{ $item->lecturer->full_name }}{{ $item->lecturer->title_end }},
                        @endforeach
                    </small><br>
                    <small class="text-primary"><em>Jurnal</em> | {{ $j->students->name }} |
                        {{ $j->created_at->year }}</small>
                </td>
                <td style="width: 100px;">
                    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                        data-bs-target="#journal-{{ $j->id }}">
                        Buka
                    </button>
                </td>
            </tr>
        @endforeach
    </table>
    <table class="table table-borderless table-hover">
        @foreach ($theses as $t)
            <tr>
                <td>
                    <a href="#" class="text-link" data-bs-toggle="tooltip" data-bs-offset="0,4"
                        data-bs-placement="top" data-bs-custom-class="tooltip-dark"
                        title="{{ $t->title }}"><strong>{{ Str::limit($t->title, 100) }}</strong></a>
                    <br><small class="text-muted">tahun : {{ $t->year }}</small><br>
                    <small class="text-primary"><em>Skripsi</em></small>
                </td>
                <td style="width: 200px;">
                    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                        data-bs-target="#theses-{{ $t->id }}">
                        Buka
                    </button>
                </td>
            </tr>
        @endforeach
    </table>
</div>

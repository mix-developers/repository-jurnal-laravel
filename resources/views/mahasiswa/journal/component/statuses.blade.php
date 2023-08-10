<div class="card mt-3">
    <div class="card-header">
        Status jurnal anda
    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Status</th>
                    <th>Tanggal Pemeriksaan</th>
                    <th>Reviewer</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($journal_statuses as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <span
                                class="badge @if ($item->id_status <= 2) bg-label-warning @elseif($item->id_status == 3) bg-label-danger @else  bg-label-primary @endif">
                                {{ $item->statuses->status }}
                            </span>
                        </td>
                        <td>
                            {{ $item->id_status == 1 ? '-' : $item->date }}
                        </td>
                        <td>
                            @if (Auth::user()->role == 'mahasiswa')
                                {{ $item->id_user == Auth::user()->id ? '-' : $item->user->name }}
                            @else
                                {{ $item->id_user != Auth::user()->id ? '-' : $item->user->name }}
                            @endif
                        </td>
                        <td>
                            {{ $item->message }}<br>
                            <small class="text-warning"><em>{{ $item->created_at->diffForHumans() }}</em></small>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Jurnal anda sedang dalam tahap pemeriksaan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

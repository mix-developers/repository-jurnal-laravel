<div class="card">
    <div class="card-header">
        Identitas mahasiswa
    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <tr>
                <td>
                    <strong> Nama Mahasiswa</strong>
                </td>
                <td>
                    {{ $journal->students->name }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>NPM Mahasiswa</strong>
                </td>
                <td>
                    <strong>{{ $journal->students->identity }}</strong><br>
                    <span class="text-muted">{{ $journal->students->major->name }}</span>

                </td>
            </tr>
        </table>
    </div>
</div>

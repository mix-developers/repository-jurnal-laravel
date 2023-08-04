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
                    {{ Auth::user()->name }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>NPM Mahasiswa</strong>
                </td>
                <td>
                    <strong>{{ Auth::user()->identity }}</strong><br>
                    <span class="text-muted">{{ Auth::user()->major->name }}</span>

                </td>
            </tr>
        </table>
    </div>
</div>

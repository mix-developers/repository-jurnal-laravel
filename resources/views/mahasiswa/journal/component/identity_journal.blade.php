<div class="card">
    <div class="card-header">
        Identitas jurnal
    </div>
    <div class="card-body">
        <table class="table table-hover table-borderles">
            <tr>
                <td>
                    <strong> Judul </strong>
                </td>
                <td>
                    {{ $journal->title }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Kata Kunci</strong>
                </td>
                <td>
                    {{ $journal->keywoards }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Abstrak</strong>
                </td>
                <td>
                    {{ $journal->abstract }}
                </td>
            </tr>
        </table>
    </div>
</div>

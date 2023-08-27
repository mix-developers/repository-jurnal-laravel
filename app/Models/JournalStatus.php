<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class JournalStatus extends Model
{
    use HasFactory;
    protected $table = 'journal_statuses';
    public function journals(): BelongsTo
    {
        return $this->belongsTo(Journal::class, 'id_journal', 'id');
    }
    public function statuses(): BelongsTo
    {
        return $this->belongsTo(Statuses::class, 'id_status', 'id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public static function notifikasi()
    {
        $journal = Journal::where('id_user', Auth::user()->id)
            ->latest()
            ->first();
        $status = self::where('id_journal', $journal->id)
            ->orderBy('id', 'desc')
            ->first();
        return $status;
    }
    public static function notifikasiAdmin($id_user)
    {
        $journal = Journal::where('id_user', $id_user)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($journal) {
            $status = self::where('id_journal', $journal->id)
                ->orderBy('id', 'desc')
                ->first();
            return $status;
        } else {
            return null; // Mengembalikan null jika tidak ada data jurnal ditemukan
        }
    }
    public static function checkJournal($id_journal)
    {
        return self::where('id_status', '<=', 2)
            ->where('id_journal', $id_journal)
            ->count();
    }
}

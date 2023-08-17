<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JournalFile extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function journals(): BelongsTo
    {
        return $this->belongsTo(Journal::class, 'id_journal', 'id');
    }
    public static function getJournal($id_journal)
    {
        return self::where('id_journal', $id_journal)
            ->first();
    }
}

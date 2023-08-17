<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Journal extends Model
{
    use HasFactory;
    public function students(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class, 'id_major', 'id');
    }
    public function journal_files()
    {
        return $this->hasMany(JournalFile::class, 'id_journal');
    }
    public function journal_statuses()
    {
        return $this->hasMany(JournalStatus::class, 'id_journal');
    }

    public static function getFront()
    {
        return self::with(['students'])
            ->whereHas('journal_statuses', function ($query) {
                $query->where('id_status', '=', 4);
            })->latest()
            ->take(4)
            ->get();
    }
    public static function getAll()
    {
        return self::with(['students', 'major'])
            ->whereHas('journal_statuses', function ($query) {
                $query->where('id_status', '=', 4);
            })
            ->get();
    }
    public static function getJournalStudent($id_student)
    {
        return self::with(['students', 'major'])
            ->where('id_student', $id_student)
            ->get();
    }
    public static function getJournalPublished()
    {
        return self::with(['students', 'major'])
            ->where('is_published', 1)
            ->get();
    }
    public static function getJournalPublishedMajor($id_major)
    {
        return self::with(['students', 'major'])
            ->where('id_major', $id_major)
            ->where('is_published', 1)
            ->get();
    }
    public static function getSearch($keywoard)
    {
        return self::with(['students', 'major'])
            ->where('title', 'LIKE', '%' . $keywoard . '%')
            ->orWhere('keywoards', 'LIKE', '%' . $keywoard . '%');
    }

    public static function checkJournal()
    {
        return self::where('id_user', Auth::user()->id)
            ->count();
    }
    public static function checkJournalExist($id)
    {
        return self::where('id_user', $id)
            ->count();
    }
}

<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
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
            });
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
    public static function getSearch($keywoard, $from_date, $to_date, $periode, $id_riset)
    {
        $query = self::with(['students', 'major'])
            ->where('title', 'LIKE', '%' . $keywoard . '%')
            ->orWhere('keywoards', 'LIKE', '%' . $keywoard . '%');

        if ($periode != null) {
            $from_date = now()->subYears($periode);
            $to_date = now(); // Set $to_date to current date

            $query->where('created_at', '>=', $from_date)
                ->where('created_at', '<=', $to_date);
        } else {
            if ($from_date && $to_date) {
                $query->where('created_at', '>=', $from_date)
                    ->where('created_at', '<=', $to_date);
            }
        }

        if ($id_riset != null) {
            $query->whereExists(function ($subquery) use ($id_riset) {
                $subquery->from('mentors')
                    ->whereRaw('mentors.id_user = journals.id_user')  // Pengecekan pertama
                    ->whereExists(function ($subsubquery) use ($id_riset) {
                        $subsubquery->from('lecturers')
                            ->whereRaw('lecturers.id = mentors.id_lecturer')  // Pengecekan kedua
                            ->where('lecturers.id_riset', $id_riset);  // Pengecekan ketiga
                    });
            });
        }


        // dd($query->get());
        return $query;
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

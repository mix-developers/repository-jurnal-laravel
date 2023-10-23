<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Journal extends Model
{
    use HasFactory;
    protected $guarded = [];

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
            ->latest();
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
            ->where(function ($query) use ($keywoard) {
                $query->where('title', 'like', '%' . $keywoard . '%')
                    ->orWhere('keywoards', 'like', '%' . $keywoard . '%');
            });

        if ($periode != null) {
            $from_date = Carbon::parse($from_date)->subYears($periode)->toDateString(); // Mengubah ke format tanggal
            $to_date = Carbon::parse($to_date)->toDateString(); // Mengubah ke format tanggal

            $query->where('created_at', '>=', $from_date)->where('created_at', '<=', $to_date);
        } elseif ($from_date != null && $to_date != null) {
            $from_date = Carbon::parse($from_date)->toDateString(); // Mengubah ke format tanggal
            $to_date = Carbon::parse($to_date)->toDateString(); // Mengubah ke format tanggal

            if ($from_date && $to_date) {
                $query->where('created_at', '>=', $from_date)->where('created_at', '<=', $to_date);
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

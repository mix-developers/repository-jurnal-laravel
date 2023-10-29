<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Theses extends Model
{
    use HasFactory;
    protected $table = 'theses';

    public function students(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class, 'id_major', 'id');
    }
    public static function getFront()
    {
        return self::with(['students', 'major'])
            ->latest()
            ->take(4)
            ->get();
    }
    public static function getAll()
    {
        return self::with(['students', 'major']);
    }
    public static function getThesesStudent($id_student)
    {
        return self::with(['students', 'major'])
            ->where('id_student', $id_student)
            ->get();
    }
    public static function getThesesMajor($id_major)
    {
        return self::with(['students', 'major'])
            ->where('id_major', $id_major)
            ->get();
    }
    public static function getSearch($keywoard, $from_date, $to_date, $periode, $id_riset)
    {
        $query = self::with(['students'])
            ->where(function ($query) use ($keywoard) {
                $query->where('title', 'like', '%' . $keywoard . '%')
                    ->orWhere('year', 'like', '%' . $keywoard . '%');
            });

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

        // if ($id_riset != null) {
        //     $query->whereExists(function ($subquery) use ($id_riset) {
        //         $subquery->from('mentors')
        //             ->whereRaw('mentors.id_user = theses.id_user')  // Pengecekan pertama
        //             ->whereExists(function ($subsubquery) use ($id_riset) {
        //                 $subsubquery->from('lecturers')
        //                     ->whereRaw('lecturers.id = mentors.id_lecturer')  // Pengecekan kedua
        //                     ->where('lecturers.id_riset', $id_riset);  // Pengecekan ketiga
        //             });
        //     });
        // }
        if ($id_riset != null) {
            $query->whereExists(function ($subquery) use ($id_riset) {
                $subquery->from('users')
                    ->whereRaw('users.id = journals.id_user')  // Pengecekan kedua
                    ->where('users.id_riset', $id_riset);  // Pengecekan ketiga
            });
        }


        return $query;
    }

    public static function checkTheses()
    {
        return self::where('id_user', Auth::user()->id)
            ->count();
    }
    public static function checkThesesExist($id)
    {
        return self::where('id_user', $id)
            ->count();
    }
}

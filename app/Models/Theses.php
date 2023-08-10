<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

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
        return self::with(['students', 'major'])->latest()->take(4)->get();
    }
    public static function getAll()
    {
        return self::with(['students', 'major'])->get();
    }
    public static function getThesesStudent($id_student)
    {
        return self::with(['students', 'major'])->where('id_student', $id_student)->get();
    }
    public static function getThesesMajor($id_major)
    {
        return self::with(['students', 'major'])->where('id_major', $id_major)->get();
    }
    public static function getSearch($keywoard)
    {
        return self::with(['students'])->where('title', 'LIKE', '%' . $keywoard . '%')
            ->orWhere('year', 'LIKE', '%' . $keywoard . '%')
            ->get();
    }
    public static function checkTheses()
    {
        return self::where('id_user', Auth::user()->id)->count();
    }
}

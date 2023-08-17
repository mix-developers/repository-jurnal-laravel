<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class AdditionalFile extends Model
{
    use HasFactory;
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function file_category(): BelongsTo
    {
        return $this->belongsTo(FileCategory::class, 'id_file_category', 'id');
    }
    public static function getAdditionalFile($id_file_category)
    {
        return self::with(['user', 'file_category'])
            ->where('id_file_category', $id_file_category)
            ->where('id_user', Auth::user()->id)
            ->first();
    }
    public static function getAdditionalFileAdmin($id_file_category, $id_student)
    {
        return self::with(['user', 'file_category'])
            ->where('id_file_category', $id_file_category)
            ->where('id_user', $id_student)
            ->first();
    }
    public static function cekAdditionalFile($id_file_category)
    {
        return self::with(['user', 'file_category'])
            ->where('id_file_category', $id_file_category)
            ->where('id_user', Auth::user()->id)
            ->count();
    }

    public static function cekAdditionalFileAdmin($id_file_category, $id_student)
    {
        return self::with(['user', 'file_category'])
            ->where('id_file_category', $id_file_category)
            ->where('id_user', $id_student)
            ->count();
    }
    public static function cekAdditionalFileJurusan($id_student)
    {
        return self::with(['user', 'file_category'])
            ->where('id_user', $id_student)
            ->get();
    }
    public static function cekAdditionalFileUser()
    {
        return self::with(['user', 'file_category'])
            ->where('id_user', Auth::user()->id)
            ->count();
    }
}

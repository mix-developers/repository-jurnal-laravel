<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Mentor extends Model
{
    use HasFactory;
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function lecturer(): BelongsTo
    {
        return $this->belongsTo(Lecturer::class, 'id_lecturer', 'id');
    }
    public static function getMentorLecturer($id_lecturer)
    {
        return self::where('id_lecturer', $id_lecturer)
            ->where('type', 'pembimbing')
            ->get();
    }
    public static function getMentorLecturerTest($id_lecturer)
    {
        return self::where('id_lecturer', $id_lecturer)
            ->where('type', 'penguji')
            ->get();
    }
    public static function getMentor($id_user)
    {
        return self::where('id_user', $id_user)
            ->where('type', 'pembimbing')
            ->get();
    }
    public static function getMentorTest($id_user)
    {
        return self::where('id_user', $id_user)
            ->where('type', 'penguji')
            ->get();
    }
    public static function checkMentorGuide()
    {
        return self::where('id_user', Auth::user()->id)
            ->where('type', 'pembimbing')
            ->count();
    }
    public static function checkMentorTest()
    {
        return self::where('id_user', Auth::user()->id)
            ->where('type', 'penguji')
            ->count();
    }
    public static function getMentorsGuide($id_user)
    {
        return self::where('id_user', $id_user)
            ->where('type', 'pembimbing')
            ->get();
    }
    public static function getMentorsTest($id_user)
    {
        return self::where('id_user', $id_user)
            ->where('type', 'penguji')
            ->get();
    }
}

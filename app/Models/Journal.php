<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Journal extends Model
{
    use HasFactory;
    public function students(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'id_student', 'id');
    }

    public static function getFront()
    {
        return self::with(['students'])->latest()->take(4)->get();
    }
    public static function getAll()
    {
        return self::with(['students'])->get();
    }
    public static function getJournalStudent($id_student)
    {
        return self::with(['students'])->where('id_student', $id_student)->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;
    public static function getCountStudents($id_major)
    {
        return self::where('id_major', $id_major)->count();
    }
    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class, 'id_major');
    }
}

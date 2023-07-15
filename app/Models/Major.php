<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Major extends Model
{
    use HasFactory;
    public function lecturer(): BelongsTo
    {
        return $this->belongsTo(Lecturer::class, 'id_lecturer_leader', 'id');
    }
    // public static getCountStudents($id_major)
    // {
    //     return self::where()
    // }
}

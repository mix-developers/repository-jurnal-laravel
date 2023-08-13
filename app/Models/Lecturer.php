<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lecturer extends Model
{
    use HasFactory;

    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class, 'id_major');
    }
    public static function getSearch($keywoard)
    {
        return self::with(['major'])->where('full_name', 'LIKE', '%' . $keywoard . '%');
    }
}

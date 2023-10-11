<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lecturer extends Model
{
    use HasFactory;
    // private $guarded;

    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class, 'id_major');
    }
    public function mentor()
    {
        return $this->hasOne(Mentor::class, 'id_lecturer', 'id');
    }
    public static function getSearch($keywoard)
    {
        $query =  self::with(['major'])
            ->where('full_name', 'LIKE', '%' . $keywoard . '%');

        return $query;
    }
}

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
    public function risets(): BelongsTo
    {
        return $this->belongsTo(Riset::class, 'id_riset');
    }
    public function mentor()
    {
        return $this->hasOne(Mentor::class, 'id_lecturer', 'id');
    }
    public static function getSearch($keywoard, $id_riset)
    {
        $query =  self::with(['major'])
            ->where(function ($query) use ($keywoard) {
                $query->where('full_name', 'LIKE', '%' . $keywoard . '%');
            });
        if ($id_riset != null) {
            $query->where('id_riset', $id_riset);
        }
        return $query;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public static function getCountStudents($id_major)
    {
        return self::where('id_major', $id_major)->count();
    }
}

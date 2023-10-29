<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'identity',
        'phone',
        'avatar',
        'id_major',
        'id_riset',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getLecturers()
    {
        return self::where('role', 'dosen')
            ->where('is_verified', 1)
            ->get();
    }
    public static function getLecturersPending()
    {
        return self::where('role', 'dosen')
            ->where('is_verified', 0)
            ->get();
    }
    public static function getStudents()
    {
        return self::where('role', 'mahasiswa')
            ->where('is_verified', 1)
            ->get();
    }
    public static function getStudentsPending()
    {
        return self::where('role', 'mahasiswa')
            ->where('is_verified', 0)
            ->get();
    }
    public static function getCountStudents($id_major)
    {
        return self::where('id_major', $id_major)
            ->where('role', 'mahasiswa')
            ->count();
    }
    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class, 'id_major');
    }
}

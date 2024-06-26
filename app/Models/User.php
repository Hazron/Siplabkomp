<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'usertype',
        'name',
        'password',
        'nim',
        'email',
        'nomor_hp',
        'angkatan',
        'program_studi',
        'fotoprofile',
        'kelas',
        'tahunakademik',
        'email_verified_at'
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'user_id', 'id');
    }

    public function riwayatPinjams()
    {
        return $this->hasMany(RiwayatPinjam::class);
    }
}

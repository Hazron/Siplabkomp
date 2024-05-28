<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal'; 

    protected $fillable = [
        'hari',
        'jam_mulai',
        'jam_selesai',
        'matakuliah',
        'status',
        'programstudi',
        'kelas',
        'dosen', 
        'ruang_id',
        'user_id',
        'tahunakademik',
        'active',
    ];

    // Jika Anda memiliki relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'ruang_id', 'id_ruang');
    }
    public function riwayatPinjams()
    {
        return $this->hasMany(RiwayatPinjam::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal'; // Nama tabel
    protected $primaryKey = 'id_jadwal'; // Primary key

    protected $fillable = [
        'hari',
        'jam_mulai',
        'jam_selesai',
        'matakuliah',
        'status',
        'ruang_id',
        'user_id',
        'active',
    ];

    // Jika Anda memiliki relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

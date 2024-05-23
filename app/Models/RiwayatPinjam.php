<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPinjam extends Model
{
    use HasFactory;

    protected $table = 'riwayatpinjam';

    protected $primaryKey = 'id_riwayat';

    protected $fillable = [
        'status',
        'waktu_booking',
        'kode_pinjam',
        'hari',
        'user_id',
        'jadwal_id',
    ];

    // Optional: Jika Anda tidak menggunakan timestamps
    public $timestamps = false;
}

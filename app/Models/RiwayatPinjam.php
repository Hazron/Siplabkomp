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
        'jam_pengambilan',
        'jam_pengembalian',
        'kode_pinjam',
        'hari',
        'user_id',
        'jadwal_id',
        'tahunakademik', // Ubah menjadi 'tahunakademik'
        'active',
        'tanggal_riwayat'
    ];

    // Tambahkan relasi dengan TahunAkademik
    public function tahunAkademik()
    {
        return $this->belongsTo(TahunAkademik::class, 'tahunakademik', 'tahun_akademik');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function jadwal(){
        return $this->belongsTo(Jadwal::class, 'jadwal_id', 'id_jadwal');
    }
}

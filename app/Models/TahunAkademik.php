<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    use HasFactory;

    protected $table = 'tahunakademik';

    protected $primaryKey = 'id';

    protected $fillable = [
        'tahun_akademik',
        'jadwal_akademik',
        'status'
    ];

    // Optional: Jika Anda tidak menggunakan timestamps
    public $timestamps = false;
}

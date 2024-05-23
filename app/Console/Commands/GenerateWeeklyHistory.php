<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\RiwayatPinjam;
use App\Models\Jadwal;
use Carbon\Carbon;

class GenerateWeeklyHistory extends Command
{
    protected $signature = 'history:generate';

    protected $description = 'Generate weekly history of bookings';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Ambil data jadwal untuk minggu ini
        $jadwals = Jadwal::whereWeek('jam_mulai', Carbon::now()->weekOfYear)
            ->get();

        // Loop melalui jadwal
        foreach ($jadwals as $jadwal) {
            // Simpan ke tabel riwayatpinjam
            RiwayatPinjam::create([
                'status' => 'Menunggu Konfirmasi',
                'waktu_booking' => Carbon::now(),
                'kode_pinjam' => 'KODE_PINJAM_' . Carbon::now()->year . Carbon::now()->weekOfYear,
                'hari' => $jadwal->hari,
                'user_id' => $jadwal->user_id,
                'jadwal_id' => $jadwal->id_jadwal
            ]);
        }

        $this->info('Weekly history generated successfully.');
    }
}

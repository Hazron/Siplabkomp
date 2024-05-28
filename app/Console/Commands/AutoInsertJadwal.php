<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AutoInsertJadwal extends Command
{
    protected $signature = 'jadwal:autoinsert';
    protected $description = 'Automatically insert jadwal entries into riwayatpinjam table if hari matches current day';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $currentDay = ucfirst(Str::lower(Carbon::now()->isoFormat('dddd')));
        $today = Carbon::today();

        Log::info('AutoInsertJadwal command is running. Current day: ' . $currentDay);

        $jadwalEntries = DB::table('jadwal')->where('hari', $currentDay)->get();

        foreach ($jadwalEntries as $jadwal) {
            $existingEntry = DB::table('riwayatpinjam')
                ->where('jadwal_id', $jadwal->id_jadwal)
                ->whereDate('tanggal_riwayat', $today)
                ->first();

            if (!$existingEntry) {
                DB::table('riwayatpinjam')->insert([
                    'status' => 'menunggu konfirmasi',
                    'waktu_booking' => null,
                    'jam_pengambilan' => null,
                    'jam_pengembalian' => null,
                    'kode_pinjam' => null,
                    'hari' => $jadwal->hari,
                    'user_id' => $jadwal->user_id,
                    'jadwal_id' => $jadwal->id_jadwal,
                    'tahunakademik_id' => $jadwal->tahunakademik,
                    'active' => null,
                    'tanggal_riwayat' => $today->toDateString(), // Mengisi tanggal_riwayat dengan tanggal hari ini
                ]);

                Log::info("Inserted jadwal ID {$jadwal->id_jadwal} into riwayatpinjam");
            } else {
                Log::info("Jadwal ID {$jadwal->id_jadwal} already exists in riwayatpinjam for today");
            }
        }

        $this->info('Auto insert jadwal command executed successfully.');
        Log::info('Perintah AutoInsertJadwal selesai.');
    }
}

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
        Log::info('Perintah AutoInsertJadwal dimulai.');

        $currentDay = ucfirst(Str::lower(Carbon::now()->isoFormat('dddd')));
    
        $jadwalEntries = DB::table('jadwal')->where('hari', $currentDay)->get();
    
        foreach ($jadwalEntries as $jadwal) {
            $existingEntry = DB::table('riwayatpinjam')
                ->where('jadwal_id', $jadwal->id_jadwal)
                ->whereDate('waktu_booking', Carbon::today())
                ->first();
    
            if (!$existingEntry) {
                DB::table('riwayatpinjam')->insert([
                    'status' => 'menunggu konfirmasi',
                    'waktu_booking' => Carbon::now(),
                    'kode_pinjam' => uniqid('PIN-', true),
                    'hari' => $jadwal->hari,
                    'user_id' => $jadwal->user_id,
                    'jadwal_id' => $jadwal->id_jadwal,
                    'tahunakademik_id' => $jadwal->tahunakademik,
                    'active' => 'active',
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

<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Console\Commands\AutoInsertJadwal;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('schedule:run', function () {
    Artisan::call('jadwal:autoinsert');
})->purpose('Automatically insert jadwal entries into riwayatpinjam table if hari matches current day')->daily();

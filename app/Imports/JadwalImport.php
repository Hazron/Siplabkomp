<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Ruang;
use App\Models\Jadwal;
use App\Models\TahunAkademik;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class JadwalImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    public function model(array $row)
    {
        if (!isset($row['matakuliah'])) {
            return null;
        }
        return new Jadwal([
            'hari' => $row['hari'],
            'jam_mulai' => $row['jam_mulai'],
            'jam_selesai' => $row['jam_selesai'],
            'matakuliah' => $row['matakuliah'],
            'programstudi' => $row['programstudi'],
            'kelas' => $row['kelas'],
            'dosen' => $row['dosen'],
            'tahunakademik' => $this->getTahunAkademikId($row['tahunakademik']),
            'ruang_id' => $this->getRuangId($row['ruang_id']),
            'user_id' => $this->getUserId($row['user_id']),
            'active' => 'yes',
        ]);
    }

    private function getRuangId($ruangName)
    {
        $ruang = Ruang::where('nama_lab', $ruangName)->first();

        if ($ruang) {
            return $ruang->id_ruang;
        }

        return null;
    }

    private function getUserId($userName)
    {
        $user = User::where('name', $userName)->first();

        if ($user) {
            return $user->id;
        }

        return null;
    }
    private function getTahunAkademikId($tahunAkademik)
    {
        $tahun = TahunAkademik::where('tahun_akademik', $tahunAkademik)->first();

        if ($tahun) {
            return $tahun->id;
        }

        return null;
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}

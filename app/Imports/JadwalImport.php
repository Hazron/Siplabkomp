<?php

namespace App\Imports;

use App\Models\Jadwal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JadwalImport implements ToModel, WithHeadingRow
{
    protected $tahunAkademikId;

    public function __construct($tahunAkademikId)
    {
        $this->tahunAkademikId = $tahunAkademikId;
    }

    public function model(array $row)
    {
        return new Jadwal([
            'hari' => $row['hari'],
            'jam_mulai' => $row['jam_mulai'],
            'jam_selesai' => $row['jam_selesai'],
            'matakuliah' => $row['matakuliah'],
            'programstudi' => $row['programstudi'],
            'kelas' => $row['kelas'],
            'dosen' => $row['dosen'],
            'tahunakademik' => $this->tahunAkademikId,
            'active' => 'active',
        ]);
    }
}

<?php
namespace App\Imports;

use App\Models\Jadwal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class jadwalImport implements ToModel, WithHeadingRow
{
    protected $tahunAkademikId;
    protected $ruangId;

    public function __construct($tahunAkademikId, $ruangId)
    {
        $this->tahunAkademikId = $tahunAkademikId;
        $this->ruangId = $ruangId;
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
            'ruang_id' => $this->ruangId,
            'active' => 'active',
        ]);
    }
}

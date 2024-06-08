<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MahasiswaImport implements ToModel, WithHeadingRow, WithMultipleSheets
{
    protected $tahunAkademik;

    public function __construct($tahunAkademik)
    {
        $this->tahunAkademik = $tahunAkademik;
    }

    public function sheets(): array
    {
        return [
            'user' => $this,
        ];
    }

    public function model(array $row)
    {
        return new User([
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']), // hash the password
            'nim' => $row['nim'],
            'angkatan' => $row['angkatan'],
            'kelas' => $row['kelas'],
            'program_studi' => $row['program_studi'],
            'fotoprofile' => $row['fotoprofile'],
            'nomor_hp' => $row['nomor_hp'],
            'usertype' => $row['usertype'],
            'email_verified_at' => now(),
            'tahunakademik' => $this->tahunAkademik,
            'active' => 'active',
        ]);
    }
}

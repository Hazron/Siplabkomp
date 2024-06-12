<?php

namespace App\Exports;

use App\Models\RiwayatPinjam;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RiwayatPinjamExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return RiwayatPinjam::with('user', 'jadwal')
            ->where('status', 'Selesai')
            ->get()
            ->map(function ($riwayat) {
                return [
                    'id' => $riwayat->id,
                    'nama' => $riwayat->user->name,
                    'nim' => $riwayat->user->nim,
                    'kelas' => $riwayat->jadwal->kelas,
                    'matakuliah' => $riwayat->jadwal->matakuliah,
                    'jam_pengambilan' => $riwayat->jam_pengambilan ? $riwayat->jam_pengambilan->format('H:i') : '-',
                    'jam_pengembalian' => $riwayat->jam_pengembalian ? $riwayat->jam_pengembalian->format('H:i') : '-',
                    'status' => $riwayat->status,
                ];
            });
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama',
            'NIM',
            'Kelas',
            'Mata Kuliah',
            'Jam Pengambilan',
            'Jam Pengembalian',
            'Status',
        ];
    }
}

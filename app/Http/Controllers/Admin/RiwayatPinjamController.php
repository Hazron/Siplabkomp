<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RiwayatPinjam;
use App\Exports\RiwayatPinjamExport;
use Maatwebsite\Excel\Facades\Excel;

class RiwayatPinjamController extends Controller
{
    public function show()
    {
        $riwayatPinjams = RiwayatPinjam::with('user', 'jadwal')->get();
        return view('admin.page.riwayat', ['riwayatPinjams' => $riwayatPinjams]);
    }
    public function export()
    {
        return Excel::download(new RiwayatPinjamExport, 'riwayat_pinjam.xlsx');
    }
}

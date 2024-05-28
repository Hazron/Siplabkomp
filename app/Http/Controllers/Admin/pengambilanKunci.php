<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RiwayatPinjam;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PengambilanKunci extends Controller
{
    public function index()
    {
        
        $riwayatPinjam = RiwayatPinjam::with(['user', 'jadwal.ruang'])
            ->where('status', '!=', 'menunggu konfirmasi')
            ->get();
            $groupedRiwayat = [];

        foreach ($riwayatPinjam as $riwayat) {
            $dayOfWeek = Carbon::parse($riwayat->jam_pengambilan)->format('l'); // 'l' memberikan hari dalam format full (misal, 'Monday')
            $groupedRiwayat[$dayOfWeek][] = $riwayat;
        }

        return view('admin.page.kunci', ['groupedRiwayat' => $groupedRiwayat]);
    }
}

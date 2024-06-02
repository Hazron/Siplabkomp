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
            $dayOfWeek = Carbon::parse($riwayat->jam_pengambilan)->format('l');
            $groupedRiwayat[$dayOfWeek][] = $riwayat;
        }

        return view('admin.page.kunci', ['groupedRiwayat' => $groupedRiwayat]);
    }

    public function verifikasiKodePinjam(Request $request)
{
    $kodePinjam = $request->input('kode_pinjam');

    $riwayatPinjam = RiwayatPinjam::where('kode_pinjam', $kodePinjam)->first();

    if ($riwayatPinjam) {
        $riwayatPinjam->status = 'sedang digunakan';
        $riwayatPinjam->save();

        return redirect()->back()->with('success', 'Kode pinjam benar. Status telah diperbarui.');
    } else {
        return redirect()->back()->with('error', 'Kode pinjam salah.');
    }
}
}

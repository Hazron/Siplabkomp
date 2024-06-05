<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RiwayatPinjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PengambilanKunci extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');

        //FORTEST
        // $testDate = '2024-06-01'; 
        // $today = Carbon::parse($testDate)->format('Y-m-d');

        $riwayatPinjam = RiwayatPinjam::with(['user', 'jadwal.ruang'])
            ->whereDate('tanggal_riwayat', $today)
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

        Log::info('Kode Pinjam received: ' . $kodePinjam);

        if (empty($kodePinjam) || strlen($kodePinjam) != 4) {
            Log::warning('Kode pinjam tidak valid: ' . $kodePinjam);
            return redirect()->back()->with('error', 'Kode pinjam tidak valid.');
        }

        $riwayat = RiwayatPinjam::where('kode_pinjam', $kodePinjam)->first();

        if ($riwayat) {
            Log::info('Riwayat ditemukan: ', $riwayat->toArray());

            $riwayat->status = 'sedang digunakan';
            $riwayat->jam_pengambilan = Carbon::now();

            if ($riwayat->save()) {
                Log::info('Status dan jam_pengambilan berhasil diubah: ', $riwayat->toArray());
                return redirect()->back()->with('success', 'Status berhasil diubah menjadi sedang digunakan.');
            } else {
                Log::error('Gagal mengubah status dan jam_pengambilan.');
                return redirect()->back()->with('error', 'Gagal mengubah status dan jam_pengambilan.');
            }
        } else {
            Log::warning('Kode pinjam tidak ditemukan.');
            return redirect()->back()->with('error', 'Kode pinjam tidak ditemukan.');
        }
    }

    public function selesaikanPeminjaman($id_riwayat)
    {
        $riwayat = RiwayatPinjam::find($id_riwayat);

        if (!$riwayat) {
            return redirect()->back()->with('error', 'Riwayat peminjaman tidak ditemukan.');
        }

        $riwayat->status = 'selesai';
        $riwayat->jam_pengembalian = Carbon::now();

        if ($riwayat->save()) {
            return redirect()->back()->with('success', 'Peminjaman berhasil diselesaikan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menyelesaikan peminjaman.');
        }
    }
}

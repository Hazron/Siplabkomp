<?php

namespace App\Http\Controllers\mahasiswa;

use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\RiwayatPinjam;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AjukanController extends Controller
{
    public function view()
    {
        $user = Auth::user();
        Carbon::setLocale('id');

        $riwayatPinjams = RiwayatPinjam::where('user_id', $user->id)
            ->whereDate('tanggal_riwayat', now())
            ->get();

        $jadwals = Jadwal::where('user_id', $user->id)->get();

        return view('mahasiswa.page.ajukanpeminjaman', [
            'riwayatPinjams' => $riwayatPinjams,
            'jadwals' => $jadwals
        ]);
    }

    public function ajukanPinjam(Request $request)
    {
        // Validasi input
        $request->validate([
            'status' => 'required|in:kosong,akan digunakan',
            'id_riwayat' => 'required|exists:riwayatpinjam,id_riwayat',
        ]);

        $status = $request->input('status');
        $idRiwayat = $request->input('id_riwayat');

        $riwayatPinjam = RiwayatPinjam::find($idRiwayat);

        if ($riwayatPinjam) {
            $updateData = [
                'status' => $status,
                'waktu_booking' => now(),
            ];

            if ($status === 'akan digunakan') {
                $updateData['kode_pinjam'] = $this->generateKodePinjam();
            }

            $riwayatPinjam->update($updateData);

            return response()->json(['status' => 'success', 'message' => 'Status berhasil diperbarui', 'kode_pinjam' => $updateData['kode_pinjam'] ?? null]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Riwayat Pinjam tidak ditemukan']);
        }
    }

    private function generateKodePinjam()
    {
        return sprintf('%04d', mt_rand(1, 9999));
    }
}

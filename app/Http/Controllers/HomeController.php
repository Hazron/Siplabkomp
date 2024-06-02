<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\RiwayatPinjam;
use App\Models\Ruang;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $today = Carbon::createFromDate(2024, 6, 1)->format('Y-m-d'); // Assuming 1st June 2024 is a Saturday

        $riwayatPinjam = RiwayatPinjam::with(['jadwal', 'user'])
            ->where('tanggal_riwayat', $today)
            ->get();

        $ruangs = Ruang::all(); // Fetch all rooms

        return view('home.index', compact('riwayatPinjam', 'ruangs'));
    }
}

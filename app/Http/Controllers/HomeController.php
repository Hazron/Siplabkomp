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
        $today = Carbon::createFromDate('today')->format('Y-m-d');

        $riwayatPinjam = RiwayatPinjam::with(['jadwal', 'user'])
            ->where('tanggal_riwayat', $today)
            ->get();

        $ruangs = Ruang::all();

        return view('home.index', compact('riwayatPinjam', 'ruangs'));
    }
}

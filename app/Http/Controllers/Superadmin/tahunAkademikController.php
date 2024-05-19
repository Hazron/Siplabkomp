<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tahunAkademikController extends Controller
{
    public function index(){
        return view('superadmin.page.tahunakademik');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'tahun_akademik' => 'required',
            'jadwal_akademik' => 'required|date',
            'status' => 'required|in:Active,Inactive',
        ]);

        // Simpan data ke dalam database
        DB::table('tahunakademik')->insert([
            'tahun_akademik' => $request->tahun_akademik,
            'jadwal_akademik' => $request->jadwal_akademik,
            'status' => $request->status,
        ]);

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Tahun Akademik berhasil ditambahkan.');
    }
}

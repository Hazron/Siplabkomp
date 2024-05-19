<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tahunAkademikController extends Controller
{
    public function index(){
        $tahunAkademiks = DB::table('tahunakademik')->get();
        return view('superadmin.page.tahunakademik', ['tahunAkademiks' => $tahunAkademiks]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_akademik' => 'required',
            'jadwal_akademik' => 'required|date',
            'status' => 'required|in:Active,Inactive',
        ]);

        DB::table('tahunakademik')->insert([
            'tahun_akademik' => $request->tahun_akademik,
            'jadwal_akademik' => $request->jadwal_akademik,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Tahun Akademik berhasil ditambahkan.');
    }
}

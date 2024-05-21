<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Imports\JadwalImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Jadwal;

class jadwalController extends Controller
{
    public function index(){
        $jadwals = Jadwal::all();
        $tahunAkademiks = DB::table('tahunakademik')->get();
        return view('superadmin.page.jadwal',compact('jadwals', 'tahunAkademiks'));
    }
    public function import(Request $request){
        $request->validate([
            'tahunakademik' => 'required',
            'excelFile' => 'required|mimes:xls,xlsx'
        ]);

        $tahunAkademikId = $request->tahunakademik;

        Excel::import(new JadwalImport($tahunAkademikId), $request->file('excelFile'));

        return redirect()->back()->with('success', 'Data jadwal berhasil diimpor.');
    }
}

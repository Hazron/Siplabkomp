<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Jadwal;
use App\Models\Ruang;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Imports\JadwalImport;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Validators\ValidationException as ExcelValidationException;

class jadwalController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'excelFile' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new JadwalImport, $request->file('excelFile'), null, \Maatwebsite\Excel\Excel::XLSX);

        return redirect()->back()->with('success', 'Data jadwal berhasil diimpor.');
    }

    public function index(Request $request)
    {
        $ruangId = $request->input('ruang_id');
        $query = Jadwal::query();

        if ($ruangId) {
            $query->where('ruang_id', $ruangId);
        }

        $jadwals = $query->get();
        $tahunAkademiks = DB::table('tahunakademik')->get();
        $ruangs = Ruang::all();
        $mahasiswa = User::where('usertype', 'mahasiswa')->get();

        return view('superadmin.page.jadwal', compact('jadwals', 'tahunAkademiks', 'mahasiswa', 'ruangs'));
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return response()->json($jadwal);
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());
        return response()->json(['success' => 'Jadwal updated successfully']);
    }
}

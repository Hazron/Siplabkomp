<?php
namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\JadwalImport;
use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class jadwalController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'excelFile' => 'required|file|mimes:xls,xlsx',
            'tahunakademik' => 'required|exists:tahunakademik,id',
            'ruang_id' => 'required|in:1,2,3',
        ]);

        $tahunAkademikId = $request->input('tahunakademik');
        $ruangId = $request->input('ruang_id');

        Excel::import(new JadwalImport($tahunAkademikId, $ruangId), $request->file('excelFile'));

        return redirect()->back()->with('success', 'Data jadwal berhasil diimpor!');
    }

    public function index()
    {
        $jadwals = Jadwal::all();
        $tahunAkademiks = DB::table('tahunakademik')->get();
        $mahasiswa = User::where('usertype', 'mahasiswa')->get();
        return view('superadmin.page.jadwal', compact('jadwals', 'tahunAkademiks', 'mahasiswa'));
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

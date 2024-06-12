<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Ruang;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class jadwaladminController extends Controller
{
    public function view(Request $request)
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

        return view('admin.page.jadwal', compact('jadwals', 'tahunAkademiks', 'ruangs', 'mahasiswa'));
    }
}

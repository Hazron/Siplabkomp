<?php

namespace App\Http\Controllers\mahasiswa;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjukanController extends Controller
{
    public function view(){
        $user = Auth::user();
        
        $jadwals = Jadwal::where('user_id', $user->id)->get();
        return view('mahasiswa.page.ajukanpeminjaman', ['jadwals' => $jadwals]);
    }
}

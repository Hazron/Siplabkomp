<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\RiwayatPinjam;
use Illuminate\Http\Request;

class pengambilanKunci extends Controller
{
    public function index(){
        $riwayatPinjam = RiwayatPinjam::all();
        return view ('admin.page.kunci', ['riwayatPinjam' =>$riwayatPinjam]);
    }
}

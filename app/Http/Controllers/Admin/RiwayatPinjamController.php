<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiwayatPinjamController extends Controller
{
    public function view(){
        return view ('admin.page.riwayat');
    }
}

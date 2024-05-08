<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiwayatPinjamController extends Controller
{
    public function view(){
        return view ('admin.page.riwayat');
    }
}

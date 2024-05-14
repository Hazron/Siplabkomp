<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TabelmahasiswaController extends Controller
{
    public function view(){
        $mahasiswa = User::where('usertype', 'mahasiswa')->get();

        return view('superadmin.page.mahasiswa', ['mahasiswa' => $mahasiswa]);
    }
}

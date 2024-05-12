<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;

class tabeluserController extends Controller
{
    public function view(){
        return view('admin.page.user');
    }

    public function mahasiswaIndex(){
        $mahasiswa = User::where('usertype', 'mahasiswa')->get();

        return view('admin.page.user', ['mahasiswa' => $mahasiswa]);
    }
}

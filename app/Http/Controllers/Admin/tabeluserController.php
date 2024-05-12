<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class tabeluserController extends Controller
{
    public function view(){
        return view('admin.page.user');
    }
}

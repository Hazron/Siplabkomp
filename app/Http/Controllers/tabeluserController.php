<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tabeluserController extends Controller
{
    public function view(){
        return view('admin.page.user');
    }
}

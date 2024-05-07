<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pengambilanKunci extends Controller
{
    public function index(){
        return view ('admin.page.kunci');
    }
}

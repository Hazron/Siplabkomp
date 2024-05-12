<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function view(){
        return view('admin.index');
    }
}

<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardSuperController extends Controller
{
    public function view(){
        return view('superadmin.index');
    }
}

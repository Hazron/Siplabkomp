<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class detailuserController extends Controller
{
    public function view(){

        return view('admin.page.detailuser');
    }
}

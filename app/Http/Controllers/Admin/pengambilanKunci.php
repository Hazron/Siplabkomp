<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class pengambilanKunci extends Controller
{
    public function index(){
        return view ('admin.page.kunci');
    }
}

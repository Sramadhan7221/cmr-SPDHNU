<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarHibahController extends Controller
{
    public function index(){
        return view('SibahNU.daftarhibah');
    }

    public function detailHibah(){
        return view('SibahNU.detailHibah');
    }
}

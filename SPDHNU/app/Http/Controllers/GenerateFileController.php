<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenerateFileController extends Controller
{
    public function index(){
        return view('SibahNU.pdf.surat_keabsahan');
    }
}

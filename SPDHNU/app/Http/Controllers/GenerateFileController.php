<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenerateFileController extends Controller
{
    public function index(){
        return view('SibahNU.generatefile');
    }

    function suratPencairan() 
    {
        return view('SibahNU.report.suratPermohonanPencairan');
    }
}

<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

class GenerateFileController extends Controller
{
    public function index(){
        return view('SibahNU.generatefile');
    }

    function suratPencairan() 
    {
        $pdf = PDF::loadView('SibahNU.report.suratPermohonanPencairan')->setPaper('a4', 'potrait');;
        return $pdf->download('report.pdf');
        // return view('SibahNU.report.suratPermohonanPencairan');
    }
}

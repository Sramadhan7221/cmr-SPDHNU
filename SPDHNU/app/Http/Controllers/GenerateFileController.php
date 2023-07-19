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
        $pdf = Pdf::loadView('SibahNU.pdf.fakta_integritas');
        set_time_limit(3600);
        return $pdf->download('report.pdf');
        // return view('SibahNU.report.suratPermohonanPencairan');
    }
}

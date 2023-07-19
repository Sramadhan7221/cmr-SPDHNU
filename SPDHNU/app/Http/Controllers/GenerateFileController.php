<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Wilayah;
use App\Models\Proposal;
use App\Models\UserLembaga;
use App\Models\RegisterUser;
use App\Models\PengurusLembaga;
use Barryvdh\DomPDF\Facade\Pdf;

class GenerateFileController extends Controller
{
    public function index(){
        return view('SibahNU.generatefile');
    }

    function suratPencairan()
    {
        $user = RegisterUser::query()->where('nik', session()->get('id_user'))->first();
        $lembaga = UserLembaga::join('lembaga', 'user_lembaga.id_lembaga', '=', 'lembaga.id_lembaga')
            ->where('user_nik', $user->nik)
            ->first(['alamat_lembaga', 'no_telp', 'email_lembaga','desa', 'kop_surat', 'domisili']);
        $proposal = Proposal::query()->where('lembaga', session()->get('id_lembaga'))->first();
        $data = [
            'user' => $user,
            'kecamatan' => Wilayah::query()->where('kode', $user->kecamatan)->first(['kode', 'nama']),
            'lembaga' => $lembaga,
            'proposal' => $proposal,
            'date' => Carbon::parse($lembaga->created_at)->format('d-m-y'),
            'pengurus' => $this->isPimpinanExist()
        ];
        $pdf = Pdf::loadView('SibahNU.pdf.surat_permohonan_pencarian',$data);
        set_time_limit(3600);
        return $pdf->download('surat_permohonan_pencairan'.Carbon::parse($lembaga->created_at)->format('d-m-y').'.pdf');
    }

    protected function isPimpinanExist () {
        $id_lembaga = session('id_lembaga');
        return PengurusLembaga::join('kepengurusan', 'pengurus_lembaga.pengurus', '=', 'kepengurusan.id_pengurus')
        ->where('lembaga', $id_lembaga)
        ->where('kepengurusan.role', "PIMPINAN")
        ->first();
    }

    function faktaIntegritas(){
        $user = RegisterUser::query()->where('nik', session()->get('id_user'))->first();
        $lembaga = UserLembaga::join('lembaga', 'user_lembaga.id_lembaga', '=', 'lembaga.id_lembaga')
            ->where('user_nik', $user->nik)
            ->first(['alamat_lembaga', 'no_telp', 'email_lembaga','desa', 'kop_surat', 'domisili']);
        $data = [
            'user' => $user,
            'kecamatan' => Wilayah::query()->where('kode', $user->kecamatan)->first(['kode', 'nama']),
            'lembaga' => $lembaga,
            'date' => Carbon::now()->format('d-m-y'),
            'pengurus' => $this->isPimpinanExist()
        ];
        $pdf = Pdf::loadView('SibahNU.pdf.fakta_integritas',$data);
        set_time_limit(3600);
        return $pdf->download('fakta_integritas'.Carbon::now()->format('d-m-y').'.pdf');
    }
}

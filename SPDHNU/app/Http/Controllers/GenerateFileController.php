<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rab;
use App\Models\Wilayah;
use App\Models\Proposal;
use App\Models\RabKegiatan;
use App\Models\UserLembaga;
use Illuminate\Support\Arr;
use App\Models\RegisterUser;
use App\Models\PengurusLembaga;
use Barryvdh\DomPDF\Facade\Pdf;
use RealRashid\SweetAlert\Facades\Alert;

class GenerateFileController extends Controller
{
    public function index()
    {
        if (!session()->get('id_lembaga')) {
            Alert::error('Oops!', 'Silahkan Lengkapi Data Lembaga Dan Daftar Hibah');
            return redirect()->back();
        }
        $rab = Proposal::join('lembaga', 'proposal.lembaga', '=', 'lembaga.id_lembaga')
                        ->where('id_lembaga', session()->get('id_lembaga'))
                        ->get(['nama_lembaga','no_NPHD','peruntukan','nilai_pengajuan','tahun','id_proposal']);
        $data = [
            'rab_list' => $rab,
        ];
        return view('SibahNU.generatefile',$data);
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

    function naskahPerjanjian($proposal_id){
        $user = RegisterUser::query()->where('nik', session()->get('id_user'))->first();
        $lembaga = UserLembaga::join('lembaga', 'user_lembaga.id_lembaga', '=', 'lembaga.id_lembaga')
                            ->where('user_nik', $user->nik)
                            ->first();
        $total_rab = Proposal::where('lembaga',session()->get('id_lembaga'))
                            ->where('id_proposal',$proposal_id)
                            ->first(['total_rab','nilai_pengajuan','peruntukan']);
        $data = RabKegiatan::join('proposal','proposal','=','proposal.id_proposal')
                            ->where('proposal',$proposal_id)
                            ->get()->toArray();
        $list = Arr::map($data, function (array $value) {
            $rab = ['nama_kegiatan' => $value['nama_kegiatan'],'sub_total' => $value['sub_total']];
            $rab['rab'] = Rab::where('rab_kegiatan', $value['id'])->get();
            return collect($rab);
            });
        $data = [
            'lembaga' => $lembaga,
            'pengurus' => $this->isPimpinanExist(),
            'list_rab' => $list,
            'nilai_rab'=> $total_rab
        ];
        $pdf = Pdf::loadView('SibahNU.pdf.naskah_perjanjian_hibah', $data);
        set_time_limit(3600);
        return $pdf->download('naskah_perjanjian_hibah'.Carbon::now()->format('d-m-y').'.pdf');
    }

    function suratPernyataan(){
        $user = RegisterUser::query()->where('nik', session()->get('id_user'))->first();
        $lembaga = UserLembaga::join('lembaga', 'user_lembaga.id_lembaga', '=', 'lembaga.id_lembaga')
            ->where('user_nik', $user->nik)
            ->first();
        $data = [
            'user' => $user,
            'kecamatan' => Wilayah::query()->where('kode', $user->kecamatan)->first(['kode', 'nama']),
            'lembaga' => $lembaga,
            'date' => Carbon::now()->format('d-m-y'),
            'pengurus' => $this->isPimpinanExist()
        ];
        $pdf = Pdf::loadView('SibahNU.pdf.surat_pernyataan',$data);
        set_time_limit(3600);
        return $pdf->download('surat_pernyataan'.Carbon::now()->format('d-m-y').'.pdf');
    }

    function suratKeabsahan(){
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
        $pdf = Pdf::loadView('SibahNU.pdf.surat_keabsahan',$data);
        set_time_limit(3600);
        return $pdf->download('surat_keabsahan_document'.Carbon::now()->format('d-m-y').'.pdf');
    }

    function rincianRAB($proposal_id)
    {
        $user = RegisterUser::query()->where('nik', session()->get('id_user'))->first();
        $lembaga = UserLembaga::join('lembaga', 'user_lembaga.id_lembaga', '=', 'lembaga.id_lembaga')
            ->where('user_nik', $user->nik)
            ->first();
        $total_rab = Proposal::where('lembaga',session()->get('id_lembaga'))
                            ->where('id_proposal',$proposal_id)
                            ->first(['total_rab']);
        $data = RabKegiatan::join('proposal','proposal','=','proposal.id_proposal')
                            ->where('proposal',$proposal_id)
                            ->get()->toArray();
        $list = Arr::map($data, function (array $value) {
            $rab = ['nama_kegiatan' => $value['nama_kegiatan'],'sub_total' => $value['sub_total']];
            $rab['rab'] = Rab::where('rab_kegiatan', $value['id'])->get();
            return collect($rab);
        });
        $data_all = [
            'list_rab'=>$list,
            'total_rab'=>$total_rab,
            'lembaga' => $lembaga,
            'pengurus' => $this->isPimpinanExist()
        ];
        $pdf = Pdf::loadView('SibahNU.pdf.rincian_rab',$data_all);
        set_time_limit(3600);
        return $pdf->download('rincian_rab'.Carbon::now()->format('d-m-y').'.pdf');
    }
}

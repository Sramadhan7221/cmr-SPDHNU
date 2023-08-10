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
            'kabupaten' => Wilayah::query()->where('kode', "32.06")->first(['kode', 'nama']),
            'desa' => Wilayah::query()->where('kode', $lembaga->desa)->first(['kode', 'nama']),
            'kecamatan' => Wilayah::query()->where('kode', $user->kecamatan)->first(['kode', 'nama']),
            'lembaga' => $lembaga,
            'proposal' => $proposal,
            'date' => $this->dateIndo(),
            'pengurus' => $this->isPimpinanExist()
        ];
        $pdf = Pdf::loadView('SibahNU.pdf.surat_permohonan_pencarian',$data);
        set_time_limit(3600);
        return $pdf->stream('surat_permohonan_pencairan'.Carbon::parse($lembaga->created_at)->format('d-m-y').'.pdf');
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
            'kabupaten' => Wilayah::query()->where('kode', "32.06")->first(['kode', 'nama']),
            'desa' => Wilayah::query()->where('kode', $lembaga->desa)->first(['kode', 'nama']),
            'kecamatan' => Wilayah::query()->where('kode', $user->kecamatan)->first(['kode', 'nama']),
            'lembaga' => $lembaga,
            'date' => $this->dateIndo(),
            'pengurus' => $this->isPimpinanExist()
        ];
        $pdf = Pdf::loadView('SibahNU.pdf.fakta_integritas',$data);
        set_time_limit(3600);
        return $pdf->stream('fakta_integritas'.Carbon::now()->format('d-m-y').'.pdf');
    }

    function naskahPerjanjian($proposal_id){
        $user = RegisterUser::query()->where('nik', session()->get('id_user'))->first();
        $lembaga = UserLembaga::join('lembaga', 'user_lembaga.id_lembaga', '=', 'lembaga.id_lembaga')
                            ->where('user_nik', $user->nik)
                            ->first();
        $total_rab = Proposal::where('lembaga',session()->get('id_lembaga'))
                            ->where('id_proposal',$proposal_id)
                            ->first(['total_rab','nilai_pengajuan','peruntukan','no_NPHD']);
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
            'kabupaten' => Wilayah::query()->where('kode', "32.06")->first(['kode', 'nama']),
            'desa' => Wilayah::query()->where('kode', $lembaga->desa)->first(['kode', 'nama']),
            'kecamatan' => Wilayah::query()->where('kode', $user->kecamatan)->first(['kode', 'nama']),
            'pengurus' => $this->isPimpinanExist(),
            'list_rab' => $list,
            'nilai_rab'=> $total_rab
        ];
        $pdf = Pdf::loadView('SibahNU.pdf.naskah_perjanjian_hibah', $data);
        set_time_limit(3600);
        return $pdf->stream('naskah_perjanjian_hibah'.Carbon::now()->format('d-m-y').'.pdf');
    }

    function suratPernyataan(){
        $user = RegisterUser::query()->where('nik', session()->get('id_user'))->first();
        $lembaga = UserLembaga::join('lembaga', 'user_lembaga.id_lembaga', '=', 'lembaga.id_lembaga')
            ->where('user_nik', $user->nik)
            ->first();
        $data = [
            'user' => $user,
            'kabupaten' => Wilayah::query()->where('kode', "32.06")->first(['kode', 'nama']),
            'desa' => Wilayah::query()->where('kode', $lembaga->desa)->first(['kode', 'nama']),
            'kecamatan' => Wilayah::query()->where('kode', $user->kecamatan)->first(['kode', 'nama']),
            'lembaga' => $lembaga,
            'date' => $this->dateIndo(),
            'pengurus' => $this->isPimpinanExist()
        ];
        $pdf = Pdf::loadView('SibahNU.pdf.surat_pernyataan',$data);
        set_time_limit(3600);
        return $pdf->stream('surat_pernyataan'.Carbon::now()->format('d-m-y').'.pdf');
    }

    function suratKeabsahan(){
        $user = RegisterUser::query()->where('nik', session()->get('id_user'))->first();
        $lembaga = UserLembaga::join('lembaga', 'user_lembaga.id_lembaga', '=', 'lembaga.id_lembaga')
                            ->where('user_nik', $user->nik)
                            ->first(['alamat_lembaga', 'no_telp', 'email_lembaga','desa', 'kop_surat', 'domisili']);
        $data = [
            'user' => $user,
            'kabupaten' => Wilayah::query()->where('kode', "32.06")->first(['kode', 'nama']),
            'desa' => Wilayah::query()->where('kode', $lembaga->desa)->first(['kode', 'nama']),
            'kecamatan' => Wilayah::query()->where('kode', $user->kecamatan)->first(['kode', 'nama']),
            'lembaga' => $lembaga,
            'date' => $this->dateIndo(),
            'pengurus' => $this->isPimpinanExist()
        ];
        $pdf = Pdf::loadView('SibahNU.pdf.surat_keabsahan',$data);
        set_time_limit(3600);
        return $pdf->stream('surat_keabsahan_document'.Carbon::now()->format('d-m-y').'.pdf');
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
            'kecamatan' => Wilayah::query()->where('kode', $user->kecamatan)->first(['kode', 'nama']),
            'lembaga' => $lembaga,
            'date' => $this->dateIndo(),
            'pengurus' => $this->isPimpinanExist()
        ];
        $pdf = Pdf::loadView('SibahNU.pdf.rincian_rab',$data_all);
        set_time_limit(3600);
        return $pdf->stream('rincian_rab'.Carbon::now()->format('d-m-y').'.pdf');
    }

    function dateIndo(){
        $user = RegisterUser::query()->where('nik', session()->get('id_user'))->first();
        $lembaga = UserLembaga::join('lembaga', 'user_lembaga.id_lembaga', '=', 'lembaga.id_lembaga')
            ->where('user_nik', $user->nik)
            ->first();
        $tanggal = Carbon::parse($lembaga->created_at)->format('y-m-d');
        switch(date('m', strtotime($tanggal))){
            case '01':
                $bulan = 'Januari';
                break;
            case '02':
                $bulan = 'Februari';
                break;
            case '03':
                $bulan = 'Maret';
                break;
            case '04':
                $bulan = 'April';
                break;
            case '05':
                $bulan = 'Mei';
                break;
            case '06':
                $bulan = 'Juni';
                break;
            case '07':
                $bulan = 'Juli';
                break;
            case '08':
                $bulan = 'Agustus';
                break;
            case '09':
                $bulan = 'September';
                break;
            case '10':
                $bulan = 'Oktober';
                break;
            case '11':
                $bulan = 'November';
                break;
            case '12':
                $bulan = 'Desember';
                break;
            default:
            $bulan = 'Tidak Diketahui';
        }

        $formatDateIndo = date('d', strtotime($tanggal)).' '.$bulan.' '.
                          date('Y', strtotime($tanggal));
        return $formatDateIndo;
    }
}

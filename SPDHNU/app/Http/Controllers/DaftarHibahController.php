<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Lembaga;
use App\Models\Proposal;

class DaftarHibahController extends Controller
{
    public function index(){
        return view('SibahNU.daftarhibah');
    }

    public function detailHibah(){
        if(!session()->get('id_lembaga')){
            Alert::error('Oops!', 'Data Lembaga Belum Lengkap');
        }
        $DataBank = Lembaga::query()->where('id_lembaga',Session::get('id_lembaga'))->first();
        $dataProposal = Proposal::query()->where('lembaga', Session::get('id_lembaga'))->first();
        $data = [
            'dataBank' => $DataBank ?? new Lembaga,
            'dataProposal' => $dataProposal ?? new Proposal
        ];
        return view('SibahNU.detailHibah',$data);
    }

    public function AddDataBank(Request $request){
        $rules = [
            'bank' => 'required',
            'no_rek' => 'required',
            'nama_rekening' => 'required',
            'cabang_bank' => 'required',
            'file_buku_tabungan' => 'required|max:2048'
        ];

        $message = [
            'bank.required' => 'Bank Harus Diisi',
            'no_rek.required' => 'No Rekening Harus Diisi',
            'nama_rekening.required' => 'Nama Rekening Harus Diisi',
            'cabang_bank' => 'Cabang Bank Harus Diisi',
            'file_buku_tabungan.required' => 'Buku Tabungan Harus Di Upload',
            'file_buku_tabungan.max' => 'Ukruan File Harus 2MB'
        ];

        $validated = Validator::make($request->all(), $rules,$message);
        if($validated->fails()){
            return redirect()->back()->withErrors($validated);
        }

        $dataBank = $validated->validate();
        $file_buku_tabungan = $request->file('file_buku_tabungan');
        $file_buku_tabungan_name = $file_buku_tabungan->getClientOriginalName();
        $file_buku_tabungan_path = Storage::putFileAs($file_buku_tabungan, $file_buku_tabungan_name);
        $dataBank['file_buku_tabungan'] = $file_buku_tabungan_path;
        Lembaga::query()->where('id_lembaga', Session::get('id_lembaga'))->update($dataBank);
        return redirect()->back()->withSuccess('Data Berhasil Disimpan');
    }

    public function addProposal(Request $request){
        $rules = [
            'peruntukan' => 'required',
            'no_NPHD' => 'required|unique:proposal,no_NPHD',
            'file_proposal' => 'required|max:2048'
        ];

        $message = [
            'peruntukan.required' => 'Peruntukan Harus Diisi',
            'no_NPHD.required' => 'No NPHD Harus Diisi',
            'no_NPHD.unique' => 'No NPHD sudah Terdaftar',
            'file_proposal.required' => 'File Proposal Harus Di Upload',
            'file_proposal.max' => 'File Harus Berukuran 2MB'
        ];

        $validated = Validator::make($request->all(),$rules,$message);
        if($validated->fails()){
            return redirect()->back()->withErrors($validated);
        }
        $dataProposal = $validated->validate();
        $file_proposal = $request->file('file_proposal');
        $file_proposal_name = $file_proposal->getClientOriginalName();
        $file_proposal_path = Storage::putFileAs($file_proposal, $file_proposal_name);
        $dataProposal['file_propsal'] = $file_proposal_path;
        $dataProposal['lembaga'] = Session::get('id_lembaga');
        Proposal::query()->create($dataProposal);
        return redirect()->back()->withSuccess('Data Berhasil Disimpan');
    }
}

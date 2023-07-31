<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Lembaga;

class BankController extends Controller
{
    public function index($id_proposal){
        if(!session()->get('id_lembaga')){
            Alert::error('Oops!', 'Data Lembaga Belum Lengkap');
            return redirect()->back();
        }

        $proposal = $this->headHibah($id_proposal);
        $DataBank = Lembaga::query()->where('id_lembaga',Session::get('id_lembaga'))->first();
        $data = [
            'dataBank' => $DataBank ?? new Lembaga,
            'display_menu' => $this->display_menu,
            'actived_menu' => 'Pengkinian Data',
            'proposal' => $proposal
        ];
        return view('SibahNU.daftarHibabh.bank',$data);
    }

    public function AddDataBank(Request $request){
        $rules = $this->validateRulesData(Session::get('id_lembaga'), $request->id_proposal);

        $message = [
            'no_NPHD.required' => 'Nomor NPHD Harus Diisi',
            'peruntukan.required' => 'Peruntukan Dana harus diisi',
            'bank.required' => 'Bank Harus Diisi',
            'no_rek.required' => 'No Rekening Harus Diisi',
            'nama_rekening.required' => 'Nama Rekening Harus Diisi',
            'cabang_bank' => 'Cabang Bank Harus Diisi',
            'file_buku_tabungan.required' => 'Buku Tabungan Harus Di Upload',
            'file_buku_tabungan.max' => 'Ukruan File Harus 2MB',
            'file_proposal.required' => 'File Proposal Harus Di Upload',
            'file_proposal.max' => 'Ukruan File Harus 2MB'
        ];

        $validated = Validator::make($request->all(), $rules,$message);
        if($validated->fails()){
            return redirect()->back()->withErrors($validated);
        }

        $data = $validated->validate();
        $data['file_proposal'] = $request->file('file_proposal') ?? 'kosong';
        $dataBank = $this->updateProposal($request->id_proposal, $data);
        $file_buku_tabungan = $request->file('file_buku_tabungan');
        if ($file_buku_tabungan != null) {
            $file_buku_tabungan_name = $file_buku_tabungan->getClientOriginalName();
            $file_buku_tabungan_path = Storage::putFileAs($file_buku_tabungan, $file_buku_tabungan_name);
            $dataBank['file_buku_tabungan'] = $file_buku_tabungan_path;
        }
        Lembaga::query()->where('id_lembaga', Session::get('id_lembaga'))->update($dataBank);
        return redirect()->back()->withSuccess('Data Berhasil Disimpan');
    }

    function updateProposal($id_proposal,$all_data)
    {
        $data['no_NPHD'] = $all_data['no_NPHD'];
        $data['peruntukan'] = $all_data['peruntukan'];
        if (isset($all_data['file_proposal']))
        {
            if ($all_data['file_proposal'] != 'kosong')
            {
                $file_proposal = $all_data['file_proposal'];
                $file_proposal_name = $file_proposal->getClientOriginalName();
                $file_proposal_path = Storage::putFileAs($file_proposal, $file_proposal_name);
                $data['file_proposal'] = $file_proposal_path;
            }
        }

        Proposal::query()->where('id_proposal', $id_proposal)->update($data);
        unset($all_data['no_NPHD'], $all_data['peruntukan'], $all_data['file_proposal']);
        return $all_data;
    }

    function validateRulesData($id_lembaga,$id_proposal)
    {
        $rules = [
            'no_NPHD' => 'required',
            'peruntukan' => 'required',
            'file_proposal' => 'required|max:2048',
            'bank' => 'required',
            'no_rek' => 'required',
            'nama_rekening' => 'required',
            'cabang_bank' => 'required',
            'file_buku_tabungan' => 'required|max:2048'
        ];

        $data_proposal = Proposal::where('id_proposal', $id_proposal)->get();
        $data_bank = Lembaga::where('id_lembaga', $id_lembaga)->get();
        if ($data_proposal->file_proposal)
        {
            $rules['file_proposal'] = 'max:2048';
        }
        if ($data_bank->file_buku_tabungan)
        {
            $rules['file_buku_tabungan'] = 'max:2048';
        }

        return $rules;
    }
}

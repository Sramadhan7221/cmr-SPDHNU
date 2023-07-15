<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Lembaga;
use App\Models\Proposal;

class ProposalController extends Controller
{
    public function _construct(){
        $this->display_menu = [
            'rab' => false,
            'proposal' => true,
            'history' => false,
            'bank' => false
        ];
    }

    public function index() {
        if(!session()->get('id_lembaga')){
            Alert::error('Oops!', 'Data Lembaga Belum Lengkap');
        }
        $DataBank = Lembaga::query()->where('id_lembaga',Session::get('id_lembaga'))->first();
        $dataProposal = Proposal::query()->where('lembaga', Session::get('id_lembaga'))->first();
        $data = [
            'dataBank' => $DataBank ?? new Lembaga,
            'dataProposal' => $dataProposal ?? new Proposal,
            'display_menu' => $this->display_menu
        ];
        return view('SibahNU.daftarHibabh.proposal',$data);
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
        $dataProposal['file_proposal'] = $file_proposal_path;
        $dataProposal['lembaga'] = Session::get('id_lembaga');
        Proposal::query()->create($dataProposal);
        return redirect()->back()->withSuccess('Data Berhasil Disimpan');
    }
}

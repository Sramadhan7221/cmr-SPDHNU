<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Type\Decimal;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Lembaga;
use App\Models\Proposal;
use App\Models\Rab;

class DaftarHibahController extends Controller
{
    public function index()
    {
        if (!session()->get('id_lembaga')) {
            Alert::error('Oops!', 'Data Lembaga Belum Lengkap');
        }

        $proposal = Proposal::select(['id_proposal','sumber_dana','nama_lembaga','alamat_lembaga','peruntukan','nilai_pengajuan','tahun'])
            ->join('lembaga', 'proposal.lembaga', '=', 'lembaga.id_lembaga')
            ->where('lembaga', session('id_lembaga'))
            ->where('proposal.deleted_at',null)
            ->get();

        $data = [
            'proposals' => $proposal,
            'tahun' => $this->generateYears()
        ];

        return view('SibahNU.daftarHibabh.dafatarHibah',$data);
    }

    function addProposal(Request $request)
    {
        $rules = [
            'no_NPHD' => 'required|regex:/^[a-zA-Z0-9\/.]+$/',
            'peruntukan' => 'required|regex:/^[a-zA-Z\s.-]+$/',
            'sumber_dana' => 'required|regex:/^[a-zA-Z\s.-]+$/',
            'nilai_pengajuan' => 'required|regex:/^[0-9]+$/',
            'file_proposal' => 'required|max:2048',
            'tahun' => 'required'
        ];

        $message = [
            'no_NPHD.required' => 'NPHD Harus Diisi',
            'peruntukan.required' => 'Peruntukan Harus Diisi',
            'sumber_dana.required' => 'Sumber Dana Harus Diisi',
            'no_NPHD.regex' => 'Format Harus Abjad',
            'peruntukan.regex' => 'Format Harus Abjad',
            'sumber_dana.regex' => 'Format Harus Abjad',
            'nilai_pengajuan.required' => 'Jumlah Harus Diisi',
            'nilai_pengajuan.regex' => 'Jumlah hanya menerima format angka',
            'file_proposal.required' => 'file Harus Diisi',
            'file_proposal.max' => 'File KTP Harus 2MB',
            'tahun.required' => 'Mohon isi Tahun'
        ];

        if($request->id_proposal) {
            dd($request);
            $rules['file_proposal'] = 'max:2048';
            return $this->editProposal($request,$rules,$message);
        }

        $validated = Validator::make($request->all(), $rules, $message);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput($request->all());
        }

        $data = $validated->validate();
        $file_proposal = $request->file('file_proposal');
        if ($file_proposal) {
            $file_proposal_name = $file_proposal->getClientOriginalName();
            $file_proposal_path = Storage::putFileAs($file_proposal, $file_proposal_name);
            $data['file_proposal'] = $file_proposal_path;
        }

        $id_lembaga = session('id_lembaga');
        $data['lembaga'] = $id_lembaga;
        Proposal::create($data);
        return redirect()->back()->withSuccess('Data Berhasil Disimpan');
    }

    public function detailHibah()
    {
        if(!session()->get('id_lembaga')){
            Alert::error('Oops!', 'Data Lembaga Belum Lengkap');
        }
        return view(route('bank'));
    }

    public function detailProposal(Request $request)
    {
        $id_proposal = $request->get('id_proposal');
        $proposal = Proposal::where('id_proposal', $id_proposal)
            ->first();

        if ($proposal)
            return response()->json($proposal, 200);
        else
            return response()->json([], 404);
    }

    protected function editProposal($request,$rules,$message)
    {
        $validated = Validator::make($request->all(), $rules, $message);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput($request->all());
        }

        $data = $validated->validate();
        $file_proposal = $request->file('file_proposal');
        if ($file_proposal) {
            $file_proposal_name = $file_proposal->getClientOriginalName();
            $file_proposal_path = Storage::putFileAs($file_proposal, $file_proposal_name);
            $data['file_proposal'] = $file_proposal_path;
        }

        Proposal::where('id_proposal',$request->id_proposal)
            ->update($data);

        return redirect(route('daftarHibah'))->withSuccess('Data Berhasil Diupdate');
    }

    public function deleteProposal($id_proposal)
    {
        $deleted = Proposal::where('id_proposal', $id_proposal)
            ->delete();

        if ($deleted > 0)
            return redirect(route('/daftarhibah'))->withSuccess('Data Berhasil Diupdate');
        else
            return redirect(route('/daftarhibah'))->withErrors('Data Gagal Diupdate');
    }

    protected function generateYears()
    {
        $arrYears = [];
        for ($i=5; $i > 0; $i--) {
            $item = (int)date('Y') - $i;
            array_push($arrYears, (string)$item);
        }
        array_push($arrYears, date('Y'));
        for ($i=1; $i < 6; $i++) {
            $item = (int)date('Y') + $i;
            array_push($arrYears, (string)$item);
        }

        return $arrYears;
    }
}

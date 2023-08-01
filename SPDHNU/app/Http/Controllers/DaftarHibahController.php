<?php

namespace App\Http\Controllers;

use App\Models\Rab;
use App\Models\Lembaga;
use App\Models\Wilayah;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Decimal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class DaftarHibahController extends Controller
{
    public function index()
    {
        if (!session()->get('id_lembaga') && !session()->get('id_admin')) {
            Alert::error('Oops!', 'Data Lembaga Belum Lengkap');
            return redirect()->back();
        }
        $mwc = Lembaga::select(['id_lembaga','nama_lembaga'])->get();
        if($lembaga = session()->get('id_user')){
            $proposal = Proposal::select(['id_proposal','sumber_dana','nama_lembaga','alamat_lembaga','peruntukan','nilai_pengajuan','tahun'])
                ->join('lembaga', 'proposal.lembaga', '=', 'lembaga.id_lembaga')
                ->where('lembaga', session('id_lembaga'))
                ->where('proposal.deleted_at',null)
                ->get();
            $data = [
                'proposals' => $proposal,
                'mwc' => $mwc,
                'tahun' => $this->generateYears(),
                'actived_menu' => '',
            ];

            return view('SibahNU.daftarHibabh.dafatarHibah',$data);
        } else {
            $proposal = Proposal::select(['id_proposal','sumber_dana','nama_lembaga','alamat_lembaga','peruntukan','nilai_pengajuan','tahun'])
                ->join('lembaga', 'proposal.lembaga', '=', 'lembaga.id_lembaga')
                ->where('proposal.deleted_at',null)
                ->get();
            $data = [
                'proposals' => $proposal,
                'mwc' => $mwc,
                'tahun' => $this->generateYears(),
                'actived_menu' => '',
            ];

            return view('SibahNU.daftarHibabh.dafatarHibah',$data);
        }
    }

    function addDanaHibah(Request $request){
        $rules = [
            'sumber_dana' => 'required|regex:/^[a-zA-Z\s.-]+$/',
            'nilai_pengajuan' => 'required|regex:/^[0-9]+$/',
            'tahun' => 'required',
            'lembaga'=> 'required'
        ];

        $message = [
            'sumber_dana.required' => 'Sumber Dana Harus Diisi',
            'sumber_dana.regex' => 'Format Harus Abjad',
            'nilai_pengajuan.required' => 'Jumlah Harus Diisi',
            'nilai_pengajuan.regex' => 'Jumlah hanya menerima format angka',
            'tahun.required' => 'Mohon isi Tahun',
            'lembaga.required' => 'Mwc Belum dipilih'
        ];
        $validated = Validator::make($request->all(), $rules, $message);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput($request->all());
        }
        $data = $validated->validate();
        Proposal::create($data);
        return redirect()->back()->withSuccess('Data Berhasil Disimpan');
    }

    function addProposal(Request $request)
    {
        $rules = [
            'no_NPHD' => 'required|regex:/^[a-zA-Z0-9\/.]+$/|unique:proposal,no_NPHD',
            'peruntukan' => 'required|regex:/^[a-zA-Z\s.-]+$/',
            'sumber_dana' => 'required|regex:/^[a-zA-Z\s.-]+$/',
            'nilai_pengajuan' => 'required|regex:/^[0-9]+$/',
            'file_proposal' => 'required|max:2048',
            'tahun' => 'required'
        ];

        $message = [
            'no_NPHD.required' => 'NPHD Harus Diisi',
            'no_NPHD.unique' => 'No NPHD Sudah Terdaftar',
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

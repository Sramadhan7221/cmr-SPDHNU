<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\RabKegiatan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class RabKegiatanController extends Controller
{
    public function __construct()
    {
        $this->display_menu = [
            'bank' => false,
            'proposal' => false,
            'rab' => false,
            'history' => false,
            'kegiatan' => true
        ];
    }

    function index($id_proposal)
    {
        $list_sub = RabKegiatan::where('proposal', $id_proposal)
            ->where('deleted_at',null)
            ->get();

        $total_rab = Proposal::join('rab_kegiatan','proposal','=','proposal.id_proposal')
                                ->join('rab','rab_kegiatan','=','rab_kegiatan.id')
                                ->where('proposal',$id_proposal)
                                ->first(['total_rab']);
        $data = [
            'display_menu' => $this->display_menu,
            'proposal' => $this->headHibah($id_proposal),
            'list_kegiatan' => $list_sub,
            'total_rab' => $total_rab ?? new Proposal,
            'actived_menu' => 'Rincian RAB',
        ];
        return view('SibahNU.daftarHibabh.rabKegiatan', $data);
    }

    function addRabKegiatan(Request $request)
    {
        $rules = [
            'nama_kegiatan' => 'required|regex:/^[a-zA-Z0-9\/.\s]+$/'
        ];
        $message = [
            'nama_kegiatan.required' => 'Sub Kegiatan harus diisi',
            'nama_kegiatan.regex' => 'Format penulisan tidak diterima'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput($request->all());
        }

        $data = $validated->validate();
        if ($request->id_kegiatan) {
            unset($data['id_kegiatan']);
            RabKegiatan::where('id', $request->id_kegiatan)
                ->update($data);
            return redirect()->back()->withSuccess('Data Berhasil Diupdate');
        }
        $data['proposal'] = $request->id_proposal;
        RabKegiatan::create($data);
        return redirect()->back()->withSuccess('Data Berhasil Disimpan');
    }

    function getRabKegiatan(Request $request)
    {
        $id = $request->id_kegiatan;
        $sub_kegiatan = RabKegiatan::where('id', $id)->first();
        if ($sub_kegiatan)
            return response()->json($sub_kegiatan, 200);
        else
            return response()->json([], 404);
    }

    function deleteKegiatan($id)
    {
        $proposal = Proposal::join('rab_kegiatan','proposal','=','proposal.id_proposal')
                    ->where('id',$id)
                    ->first(['total_rab','id']);
        $deleted = RabKegiatan::where('id', $id)
            ->delete();
        $restore = RabKegiatan::withTrashed()->where('id',$id)->first();
        $updateTotalRab = $proposal['total_rab'] - $restore['sub_total'];
        Proposal::join('rab_kegiatan','proposal','=','proposal.id_proposal')
                ->where('id',$id)
                ->update(['total_rab' => $updateTotalRab]);
        if ($deleted > 0){
            Alert::success('Data Berhasil DiHapus');
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors('Data Gagal Diupdate');
        }
    }
}

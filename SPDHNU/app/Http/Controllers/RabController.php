<?php

namespace App\Http\Controllers;

use App\Models\Rab;
use App\Models\Lembaga;
use App\Models\Proposal;
use App\Models\RabKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class RabController extends Controller
{
    public function __construct()
    {
        $this->display_menu = [
            'bank' => false,
            'proposal' => false,
            'rab' => true,
            'history' => false,
            'kegiatan' => false
        ];
    }

    function index($id_kegiatan) {
        $proposal = Proposal::query()->where('lembaga', session()->get('id_lembaga'))->first();
        $dataRab = Rab::query()->where('rab_kegiatan', $id_kegiatan)->get();
        $rab_kegiatan = RabKegiatan::query()->where('id',$id_kegiatan)->first();
        $data = [
            'display_menu' => $this->display_menu,
            'proposal' => $this->headHibah($proposal->id_proposal),
            'dataRab' => $dataRab,
            'kegiatan' => $rab_kegiatan,
            'actived_menu' => 'Rincian RAB',
        ];
        return view('SibahNU.daftarHibabh.rab',$data);
    }

    function addRab(Request $request,$id_kegiatan) {
        $proposal = Proposal::join('rab_kegiatan','proposal','=','proposal.id_proposal')
                    ->where('id',$id_kegiatan)
                    ->first(['sub_total','total_rab','id']);
        $rules = [
            'uraian'=> 'required|regex:/^[a-zA-Z\s.-]+$/',
            'satuan'=> 'required|regex:/^[a-zA-Z\s.-]+$/',
            'qty'=> 'required',
            'harga' => 'required'
        ];

        $message = [
            'uraian.required' => 'Uraian harus Diisi',
            'uraian.regex' => 'Format Uraian Harus Abjad',
            'satuan.required' => 'Satuan harus Diisi',
            'satuan.regex' => 'Format Satuan Harus Abjad',
            'qty.required' => 'Jumlah minimal 1',
            'harga.required' => 'Harga harus Diisi'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput($request->all());
        }

        $data = $validated->validate();
        if($request->id_rab) {
            Rab::where('id_rab', $request->id_rab)
                ->update($data);
            return redirect()->back()->withSuccess('Data Berhasil Diupdate');
        }
        $data['total'] = $data['qty'] * $data['harga'];
        // $sub_total = $rab_kegiatan['sub_total'] + $data['total'];
        $sub_total = $proposal['sub_total'] + $data['total'];
        $total_rab = $proposal['total_rab'] + $data['total'];
        $data['rab_kegiatan'] = $proposal->id;
        if($total_rab > 5000000){
            Alert::error('Oops!','Total Rab Melebihi Batas Dana');
            return redirect()->back();
        }
        Rab::create($data);
        RabKegiatan::where('id',$id_kegiatan)->update(['sub_total' => $sub_total]);
        Proposal::join('rab_kegiatan','proposal','=','proposal.id_proposal')
                    ->where('id',$id_kegiatan)->update(['total_rab' => $total_rab]);
        return redirect()->back()->withSuccess('Data Berhasil Disimpan');
    }

    function getRabDetail(Request $request) {
        $id = $request->get('id_rab');
        $rab = Rab::where('id_rab', $id)
            ->where('deleted_at', null)
            ->first();

        if ($rab)
            return response()->json($rab, 200);
        else
            return response()->json([], 404);
    }

    public function deletePersyaratan(Request $request, $id_rab)
    {
        $proposal = Proposal::join('rab_kegiatan','proposal','=','proposal.id_proposal')
                    ->join('rab','rab_kegiatan','=','rab_kegiatan.id')
                    ->where('id_rab',$id_rab)
                    ->first(['sub_total','total_rab','id']);
        $deleted = Rab::where('id_rab', $id_rab)
                   ->delete();
        $restore = Rab::withTrashed()->where('id_rab',$id_rab)->first();
        $MinSubTotal = $proposal['sub_total'] - $restore['total'];
        $MinTotalRab = $proposal['total_rab'] - $restore['total'];
        RabKegiatan::join('rab','rab_kegiatan','=','rab_kegiatan.id')
                    ->where('id_rab',$id_rab)
                    ->update(['sub_total'=> $MinSubTotal]);
        Proposal::join('rab_kegiatan','proposal','=','proposal.id_proposal')
                ->join('rab','rab_kegiatan','=','rab_kegiatan.id')
                ->where('id_rab',$id_rab)
                ->update(['total_rab' => $MinTotalRab]);
        if ($deleted > 0)
            return redirect()->back()->withSuccess('Data Berhasil Diupdate');
        else
           return redirect()->back()->withErrors('Data Gagal Diupdate');
    }
}

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
            'kegiatan' => $rab_kegiatan
        ];
        return view('SibahNU.daftarHibabh.rab',$data);
    }

    function addRab(Request $request,$id_kegiatan) {
        $proposal = Proposal::query()->where('lembaga', session()->get('id_lembaga'))->first();
        $rab_kegiatan = RabKegiatan::query()->where('proposal', $proposal->id_proposal)->where('id',$id_kegiatan)->first();
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
        $total = (int)$data['qty'] * (int)$data['harga'];
        $data['total'] = $total;
        $data['rab_kegiatan'] = $rab_kegiatan->id;
        Rab::create($data);
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
        $deleted = Rab::where('id_rab', $id_rab)
            ->delete();

        if ($deleted > 0)
            return redirect()->back()->withSuccess('Data Berhasil Diupdate');
        else
           return redirect()->back()->withErrors('Data Gagal Diupdate');
    }
}

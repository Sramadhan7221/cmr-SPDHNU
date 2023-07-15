<?php

namespace App\Http\Controllers;

use App\Models\Rab;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Lembaga;

class RabController extends Controller
{
    public function _construct(){
        $this->display_menu = [
            'rab' => true,
            'propsal' => false,
            'history' => false,
            'bank' => false
        ];
    }

    function index() {
        $proposal = Proposal::query()->where('lembaga', session()->get('id_lembaga'))->first();
        $dataRab = Rab::query()->where('proposal',$proposal->id_proposal)->get();
        $count = 1;
        $data = [
            'dataRab' => $dataRab ?? new Rab,
            'no' => $count,
            'display_menu' => $this->display_menu
        ];
        return view('SibahNU.daftarHibabh.rab',$data);
    }

    function addRab(Request $request) {
        $proposal = Proposal::query()->where('lembaga', session()->get('id_lembaga'))->first();
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
        $data['proposal'] = $proposal->id_proposal;
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
           return redirect(route('persyaratan'))->withErrors('Data Gagal Diupdate');
    }
}

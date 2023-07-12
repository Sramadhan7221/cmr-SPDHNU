<?php

namespace App\Http\Controllers;

use App\Models\Rab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RabController extends Controller
{
    function index() {
        return false;
    }

    function addRab(Request $request) {
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

    public function deletePersyaratan(Request $request)
    {
        $deleted = Rab::where('id_rab', $request->id_rab)
            ->delete();

        if ($deleted > 0)
            redirect(route('persyaratan'))->withSuccess('Data Berhasil Diupdate');
        else
            redirect(route('persyaratan'))->withErrors('Data Gagal Diupdate');
    }
}

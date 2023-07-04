<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RegisterUser;
use App\Models\lembaga;
use Illuminate\Support\Facades\Validator;

class LembagaController extends Controller
{
    public function index(){
        $user = RegisterUser::query()->where('nik', session()->get('id_user'))->first();
        return view('SibahNU.home', [
            'user' => $user
        ]);
    }

    public function addDataLembaga(Request $request){
        $user = RegisterUser::query()->where('nik', session()->get('id_user'))->first();
        $rules = [
            'no_telp' => 'required|numeric',
            'email_lembaga' => 'required|email|unique:lembaga,email_lembaga',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'kop_surat' => 'required|max:2048',
            'domisili' => 'required|max:2048'
        ];

        $message = [
            'no_telp.required' => 'No Telephone Harus Diisi',
            'no_telp.numeric' => 'No Telephone Haris Numeric',
            'email_lembaga.required' => 'Email Harus Diisi',
            'email_lembaga.email' => 'Format Email Salah',
            'email_lembaga.unique' => 'Email Sudah Terdaftar',
            'kabupaten.required' => 'Kabupaten Harus Diisi',
            'Kecamatan.required' => 'Kecamatan Harus Diisi',
            'Desa.required' => 'Desa Harus Diisi',
            'kop_surat.required' => 'Kop Surat Harus Diisi',
            'kop_surat.max' => 'Ukuran file harus 2MB',
            'domisili.required' => 'Domisili Harus Diisi',
            'domisili.max' => 'Ukuran file harus 2MB',
        ];

        $validated = Validator::make($request->all(),$rules,$message);
        if($validated->fails()){
            return redirect()->back()->withErrors($validated)->withInput();
        }
        $data = $validated->validate();
        $data['nama_lembaga'] = $user->nama_mwc;
        $data['alamat_lembaga'] = $user->kecamatan;
        lembaga::query()->create($data);
        return redirect()->back()->with('Success', 'Data Berhasil Disimpan');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\RegisterUser;
use App\Models\Persyaratan;
use App\Models\Wilayah;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PersyaratanController extends Controller
{
    public function __construct()
    {
        $this->display_menus = [
            'home' => false,
            'operator' => false,
            'persyaratan' => true,
            'pimpinan' => false
        ];
    }

    public function index()
    {
        $persyaratan = Persyaratan::query()->get();
        $user = RegisterUser::query()->where('nik', session()->get('id_user'))->first();
        $data = [
            'persyaratan' => $persyaratan,
            'user' => $user,
            'kabupaten' => Wilayah::query()->where('kode', "32.06")->first(['kode', 'nama']),
            'kecamatan' => Wilayah::query()->where('kode', $user->kecamatan)->first(['kode', 'nama']),
            'desa' => Wilayah::getDesa($user->kecamatan),
            'display_menus' => $this->display_menus
        ];
        return view('SibahNU.persyaratan',$data);
    }

    public function addPersyaratan(Request $request){
        $rules = [
            'nama_persyaratan' => 'required',
            'nomor_surat' => 'required',
            'yang_mengeluarkan' => 'required',
            'file' => 'required|max:2048'
        ];

        $message = [
            'nama_persyaratan.required' => 'Nama surat harus diisi',
            'nomor_surat.required' => 'Nomor surat harus diisi',
            'yang_mengeluarkan.required' => 'Yang mengeluarkan harus diisi',
            'file.required' => 'File harus diisi',
            'file.max' => 'Ukuran file harus 2MB'
        ];

        $validated = Validator::make($request->all(),$rules,$message);
        if($validated->fails()){
            return redirect()->back()->withErrors($validated);
        }

        $data = $validated->validate();
        Persyaratan::create($data);
        return redirect(route('persyaratan'))->withSuccess('Data Berhasil Disimpan');
    }
}

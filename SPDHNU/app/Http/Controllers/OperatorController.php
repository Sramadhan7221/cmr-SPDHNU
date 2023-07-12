<?php

namespace App\Http\Controllers;

use App\Models\RegisterUser;
use App\Models\kepengurusan;
use App\Models\Wilayah;
use App\Models\PengurusLembaga;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class OperatorController extends Controller
{
    public function __construct()
    {
        $this->display_menus = [
            'home' => false,
            'operator' => true,
            'persyaratan' => false,
            'pimpinan' => false
        ];
    }

    public function index()
    {
        if(!session()->get('id_lembaga')){
            Alert::error('Oops!','Data Lembaga Belum Lengkap!');
            return redirect()->back();
        }

        $operator = $this->isOperatorExsist();
        $user = RegisterUser::query()->where('nik', session()->get('id_user'))->first();
        $data = [
            'user' => $user,
            'display_menus' => $this->display_menus,
            'operator' => $operator ?? new Kepengurusan()
        ];
        return view('SibahNU.operator', $data);
    }

    public function AddDataOperator(Request $request){
        //cek if pengurus is exist by nik
        $is_exist = Kepengurusan::where('no_ktp', $request->no_ktp)->first();
        $rules = [
            'nama_pengurus' => 'required|regex:/^[a-zA-Z\s.-]+$/',
            'no_ktp' => 'required|unique:kepengurusan,no_ktp',
            'no_telp' => 'required',
            'alamat_ktp' => 'required'
        ];

        $message = [
            'nama_pengurus.required' => 'Nama Harus Diisi',
            'nama_pengurus.regex' => 'Format Penulisan Harus Abjad',
            'no_ktp.required' => 'No KTP Harus Diisi',
            'no_ktp.unique' => 'No KTP Sudah Terdaftar',
            'no_telp.required' => 'No Telephone Harus Diisi',
            'no_telp.unique' => 'No Telephone Sudah Terdaftar',
            'alamat_ktp' => 'Alamat Harus Diisi'
        ];
        
        if($is_exist) 
            $rules['no_ktp'] = 'required';

        $validated = Validator::make($request->all(),$rules,$message);
        if($validated->fails()){
            return redirect()->back()->withErrors($validated)->withInput();
        }
        $id_lembaga = session('id_lembaga');
        $data = $validated->validate();
        $is_exist = $this->isOperatorExsist();
        if ($is_exist) {
            kepengurusan::where('id_pengurus', $is_exist->id_pengurus)
                ->update($data);
            return redirect()->back()->withSuccess('Data Berhasil Diupdate');
        }
        $operator = kepengurusan::create($data);
        PengurusLembaga::create(['lembaga'=> $id_lembaga, 'pengurus' => $operator->id_pengurus]);
        return redirect()->back()->withSuccess('Data Berhasil Disimpan');
    }

    protected function isOperatorExsist(){
        $id_lembaga = session('id_lembaga');
        return PengurusLembaga::join('kepengurusan', 'pengurus_lembaga.pengurus', '=', 'kepengurusan.id_pengurus')
                                ->where('lembaga', $id_lembaga)
                                ->where('kepengurusan.role', "OPERATOR")
                                ->first();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\RegisterUser;
use App\Models\kepengurusan;
use App\Models\PengurusLembaga;
use App\Models\Wilayah;
use App\Models\UserLembaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use SebastianBergmann\Type\FalseType;
use Illuminate\Support\Facades\Validator;

class PimpinanController extends Controller
{
    public function __construct()
    {
        $this->display_menus = [
            'home' => false,
            'operator' => false,
            'persyaratan' => false,
            'pimpinan' => true
        ];
    }

    public function index()
    {
        if (!session()->get('id_lembaga')) {
            Alert::error('Oops!', 'Data Lembaga Belum Lengkap');
            return redirect()->back();
        }

        $user = RegisterUser::query()->where('nik', session()->get('id_user'))->first();
        $pimpinan = $this->isPimpinanExist();

        $data = [
            'user' => $user,
            'display_menus' => $this->display_menus,
            'pimpinan' => $pimpinan ?? new Kepengurusan()
        ];
        return view('SibahNU.pimpinan', $data);
    }

    public function addDataPimpinan(Request $request){
        $rules = [
            'nama_pengurus' => 'required|regex:/^[a-zA-Z\s.-]+$/',
            'jabatan' => 'required|regex:/^[a-zA-Z\s.-]+$/',
            'no_ktp' => 'required|unique:kepengurusan,no_ktp',
            'no_telp' => 'required|unique:kepengurusan,no_telp',
            'file_ktp' => 'required|max:2048',
            'alamat_ktp' => 'required'
        ];

        $message = [
            'nama_pengurus.required' => 'Nama Pimpinan Harus Diisi',
            'nama_pengurus.regex' => 'Format Nama Harus Abjad',
            'jabatan.required' => 'Jabatan Harus Diisi',
            'jabatan.regex' => 'Format Jabatan Harus Abjad',
            'no_ktp.required' => 'No KTP Harus Diisi',
            'no_ktp.unique' => 'No KTP Sudah Terdaftar',
            'no_telp.required' => 'No Telephone Harus Diisi',
            'no_telp.unique' => 'No Telephone Sudah Terdaftar',
            'file_ktp.required' => 'No KTP Harus Diisi',
            'file_ktp.max' => 'File KTP Harus 2MB',
            'alamat_ktp.required' => 'Alamat Harus Diisi'
        ];

        $validated = Validator::make($request->all(),$rules,$message);
        if($validated->fails()){
            return redirect()->back()->withErrors($validated)->withInput($request->all());
        }

        $data = $validated->validate();
        $file_ktp = $request->file('file_ktp');
        $file_ktp_name = $file_ktp->getClientOriginalName();
        $id_lembaga = Session::get('id_lembaga');
        $file_ktp_path = Storage::putFileAs($file_ktp, $file_ktp_name);
        $data['role'] = 'PIMPINAN';
        $data['file_ktp'] = $file_ktp_path;
        //update when pimpinan is exist
        $is_exist = $this->isPimpinanExist();
        if ($is_exist) {
            kepengurusan::where('id_pengurus', $is_exist->id_pengurus)
                ->update($data);
            return redirect()->back()->withSuccess('Data Berhasil Diupdate');
        }

        $pimpinan = kepengurusan::create($data);
        PengurusLembaga::create(['lembaga'=> $id_lembaga, 'pengurus' => $pimpinan->id_pengurus]);
        return redirect()->back()->withSuccess('Data Berhasil Disimpan');
    }

    protected function isPimpinanExist () {
        $id_lembaga = Session::get('id_lembaga');
        return PengurusLembaga::join('kepengurusan', 'pengurus_lembaga.pengurus', '=', 'kepengurusan.id_pengurus')
        ->where('lembaga', $id_lembaga)
        ->where('kepengurusan.role', "PIMPINAN")
        ->first();
    }

}

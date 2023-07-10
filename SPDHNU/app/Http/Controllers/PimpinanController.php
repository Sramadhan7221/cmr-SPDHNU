<?php

namespace App\Http\Controllers;

use App\Models\RegisterUser;
use App\Models\kepengurusan;
use App\Models\Wilayah;
use App\Models\UserLembaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $user = RegisterUser::query()->where('nik', session()->get('id_user'))->first();
        // $pengurus = UserLembaga::join('lembaga', 'user_lembaga.id_lembaga', '=', 'lembaga.id_lembaga')
        //                       ->join('pengurus_lembaga', 'lembaga.id_lembaga', '=' ,'pengurus_lembaga.lembaga')
        //                       ->join('kepengurusan', 'pengurus_lembaga.pengurus', '=', 'kepengurusan.id_pengurus')
        //                       ->first(['nama_pengurus','jabatan','no_ktp','file_ktp','alamat_ktp']);
        $pimpinan = Kepengurusan::query()->first('file_ktp');
        $data = [
            'user' => $user,
            'kabupaten' => Wilayah::query()->where('kode', "32.06")->first(['kode', 'nama']),
            'kecamatan' => Wilayah::query()->where('kode', $user->kecamatan)->first(['kode', 'nama']),
            'desa' => Wilayah::getDesa($user->kecamatan),
            'display_menus' => $this->display_menus,
            'pimpinan' => $pimpinan
        ];
        return view('SibahNU.pimpinan', $data);
    }

    public function AddDataPimpinan(Request $request){
        $rules = [
            'nama_pengurus' => 'required|regex:/^[\pL\s]+$/u',
            'jabatan' => 'required|regex:/^[\pL\s]+$/u',
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
            return redirect()->back()->withErrors($validated)->withInput();
        }
        $data = $validated->validate();
        $file_ktp = $request->file('file_ktp');
        $file_ktp_name = $file_ktp->getClientOriginalName();
        $file_ktp_path = Storage::putFileAs($file_ktp, $file_ktp_name);
        $data['role'] = 'PIMPINAN';
        $data['file_ktp'] = $file_ktp_path;
        kepengurusan::create($data);
        return redirect()->back()->withSuccess('Data Berhasil Disimpan');
    }


    public function save(Request $request)
    {

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;
use App\Models\RegisterUser;
use App\Models\lembaga;
use App\Models\kepengurusan;
use Illuminate\Support\Facades\Validator;

class LembagaController extends Controller
{
    public function __construct()
    {
        $this->display_menus = [
            'home' => true,
            'operator' => false,
            'persyaratan' => false,
            'pimpinan' => false
        ];
    }

    public function index(){
        $user = RegisterUser::query()->where('nik', session()->get('id_user'))->first();
        $data = [
            'user' => $user,
            'kabupaten' => Wilayah::query()->where('kode', "32.06")->first(['kode', 'nama']),
            'kecamatan' => Wilayah::query()->where('kode', $user->kecamatan)->first(['kode', 'nama']),
            'desa' => Wilayah::getDesa($user->kecamatan),
            'display_menus' => $this->display_menus
        ];
        return view('SibahNU.home',$data);
    }

    public function addDataLembaga(Request $request){
        $user = RegisterUser::query()->where('nik', session()->get('id_user'))->first();
        $rules = [
            'no_telp' => 'required|numeric|unique:lembaga,no_telp',
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
            'no_telp.unique' => 'No Telephone Sudah Terdaftar',
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
        //upload image 
        // $kop_surat = $request->file('kop_surat');
        // $kop_surat_filename = $kop_surat->getClientOriginalName();
        // $kop_surat_path = Storage::putFileAs($kop_surat, $kop_surat_filename);
        // $domisili = $request->file('domisili');
        // $domisili_filename = $domisili->getClientOriginalName();
        // $domisili_path = Storage::putFileAs($domisili, $domisili_filename);

        $data['nama_lembaga'] = $user->nama_mwc;
        $data['alamat_lembaga'] = $user->kecamatan;
        // $data['kop_surat'] = $kop_surat_path;
        // $data['domisili'] = $domisili_path;
        Lembaga::create($data);
        return redirect()->back()->withSuccess('Data Berhasil Disimpan');
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
        $data['role'] = 'OPERATOR';
        kepengurusan::create($data);
        return redirect()->back()->withSuccess('Data Berhasil Disimpan');
    }

}

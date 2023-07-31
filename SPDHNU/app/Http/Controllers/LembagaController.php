<?php

namespace App\Http\Controllers;

use App\Models\lembaga;
use App\Models\Wilayah;
use App\Models\UserLembaga;
use App\Models\kepengurusan;
use App\Models\RegisterUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class LembagaController extends Controller
{
    public function __construct()
    {
        $this->display_menus = [
            'home' => true,
            'daftarhibah' => false,
            'operator' => false,
            'persyaratan' => false,
            'pimpinan' => false
        ];
    }

    public function index(){
        $user = RegisterUser::query()->where('nik', session()->get('id_user'))->first();
        $lembaga = UserLembaga::join('lembaga', 'user_lembaga.id_lembaga', '=', 'lembaga.id_lembaga')
            ->where('user_nik', $user->nik)
            ->first(['alamat_lembaga', 'no_telp', 'email_lembaga','desa', 'kop_surat', 'domisili']);

        if (empty($lembaga)) {
            $lembaga = new Lembaga();
            $lembaga->kop_surat = '';
            $lembaga->domisili = '';
        }

        $data = [
            'user' => $user,
            'kabupaten' => Wilayah::query()->where('kode', "32.06")->first(['kode', 'nama']),
            'kecamatan' => Wilayah::query()->where('kode', $user->kecamatan)->first(['kode', 'nama']),
            'desa' => Wilayah::getDesa($user->kecamatan),
            'display_menus' => $this->display_menus,
            'lembaga' => $lembaga
        ];
        return view('SibahNU.home',$data);
    }

    public function addDataLembaga(Request $request){
        $user = RegisterUser::query()->where('nik', session()->get('id_user'))->first();
        $rules = [
            'no_telp' => 'required|numeric|unique:lembaga,no_telp',
            'email_lembaga' => 'required|email|unique:lembaga,email_lembaga',
            'alamat_lembaga' => 'required',
            'nama_lembaga' => 'required',
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
            'alamat_lembaga.required' => 'Alamat Harus Diisi',
            'nama_lembaga.required' => 'Nama Lembaga Harus Diisi'
        ];

        $validated = Validator::make($request->all(),$rules,$message);
        if($validated->fails()){
            Alert::error('Oops!', implode(",",$validated->errors()->messages()));
            return redirect()->back();
        }
        $data = $validated->validate();
        $kop_surat = $request->file('kop_surat');
        $kop_surat_filename = $kop_surat->getClientOriginalName();
        $kop_surat_path = Storage::putFileAs($kop_surat, $kop_surat_filename);
        $domisili = $request->file('domisili');
        $domisili_filename = $domisili->getClientOriginalName();
        $domisili_path = Storage::putFileAs($domisili, $domisili_filename);

        $data['kop_surat'] = $kop_surat_path;
        $data['domisili'] = $domisili_path;
        $lembaga = Lembaga::create($data);
        $userlemabaga = UserLembaga::where('user_nik', $user->nik)
        ->update(['id_lembaga' => $lembaga->id_lembaga]);
        session()->put('id_lembaga', $lembaga->id_lembaga);
        Alert::success('Data Berhasil Disimpan');
        return redirect()->back()->withSuccess('Data Berhasil Disimpan');
    }

}

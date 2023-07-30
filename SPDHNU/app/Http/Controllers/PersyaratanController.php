<?php

namespace App\Http\Controllers;

use App\Models\RegisterUser;
use App\Models\Persyaratan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;

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
        if(!session()->get('id_lembaga')){
            Alert::error('Oops!','Data Lembaga Belum Lengkap!');
            return redirect()->back();
        }
        $persyaratan = Persyaratan::query()->where('id_lembaga',session()->get('id_lembaga'))->get();
        $user = RegisterUser::query()->where('nik', session()->get('id_user'))->first();
        $data = [
            'persyaratan' => $persyaratan,
            'user' => $user,
            'display_menus' => $this->display_menus
        ];
        return view('SibahNU.persyaratan',$data);
    }

    public function addPersyaratan(Request $request){
        if ($request->id_persyaratan)
            $this->editPersyaratan($request);

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
        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $file_path = Storage::putFileAs($file,$file_name);
        $data['file'] = $file_path;
        $data['id_lembaga'] = session('id_lembaga');
        Persyaratan::create($data);
        Alert::success('Data Berhasil Disimpan');
        return redirect(route('persyaratan'))->withSuccess('Data Berhasil Disimpan');
    }

    public function getPersyaratan(Request $request) {
        $id = $request->get('id');
        $persyaratan = Persyaratan::where('id_persyaratan', $id)
            ->where('deleted_at',null)
            ->first();

        if ($persyaratan)
            return response()->json($persyaratan,200);
        else
            return response()->json([], 404);

    }

    public function editPersyaratan(Request $request) {
        $rules = [
            'nama_persyaratan' => 'required',
            'nomor_surat' => 'required',
            'yang_mengeluarkan' => 'required',
            // 'file' => 'required|max:2048'
        ];

        $message = [
            'nama_persyaratan.required' => 'Nama surat harus diisi',
            'nomor_surat.required' => 'Nomor surat harus diisi',
            'yang_mengeluarkan.required' => 'Yang mengeluarkan harus diisi',
            'file.required' => 'File harus diisi',
            // 'file.max' => 'Ukuran file harus 2MB'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated);
        }

        $data = $validated->validate();
        $file = $request->file('file');
        if ($file) {
            $file_name = $file->getClientOriginalName();
            $file_path = Storage::putFileAs($file, $file_name);
            $data['file'] = $file_path;
        }

        Persyaratan::where('id_persyaratan',$request->id_persyaratan)
            ->update($data);
            Alert::success('Data Berhasil Diupdate');
        return redirect(route('persyaratan'))->withSuccess('Data Berhasil Diupdate');
    }

    public function deletePersyaratan (Request $request, $id_persyaratan) {
        $deleted = Persyaratan::where('id_persyaratan', $id_persyaratan)
            ->delete();

        if ($deleted > 0){
            Alert::success('Data Berhasil DiHapus');
            return redirect(route('persyaratan'))->withSuccess('Data Berhasil Diupdate');
        } else {
            return redirect(route('persyaratan'))->withErrors('Data Gagal Diupdate');
        }
    }
}

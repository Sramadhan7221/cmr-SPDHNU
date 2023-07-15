<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Lembaga;

class BankController extends Controller
{
    public function index(){
        if(!session()->get('id_lembaga')){
            Alert::error('Oops!', 'Data Lembaga Belum Lengkap');
        }
        $DataBank = Lembaga::query()->where('id_lembaga',Session::get('id_lembaga'))->first();
        $data = [
            'dataBank' => $DataBank ?? new Lembaga,
            'display_menu' => $this->display_menu
        ];
        return view('SibahNU.daftarHibabh.bank',$data);
    }

    public function AddDataBank(Request $request){
        $rules = [
            'bank' => 'required',
            'no_rek' => 'required',
            'nama_rekening' => 'required',
            'cabang_bank' => 'required',
            'file_buku_tabungan' => 'required|max:2048'
        ];

        $message = [
            'bank.required' => 'Bank Harus Diisi',
            'no_rek.required' => 'No Rekening Harus Diisi',
            'nama_rekening.required' => 'Nama Rekening Harus Diisi',
            'cabang_bank' => 'Cabang Bank Harus Diisi',
            'file_buku_tabungan.required' => 'Buku Tabungan Harus Di Upload',
            'file_buku_tabungan.max' => 'Ukruan File Harus 2MB'
        ];

        $validated = Validator::make($request->all(), $rules,$message);
        if($validated->fails()){
            return redirect()->back()->withErrors($validated);
        }

        $dataBank = $validated->validate();
        $file_buku_tabungan = $request->file('file_buku_tabungan');
        $file_buku_tabungan_name = $file_buku_tabungan->getClientOriginalName();
        $file_buku_tabungan_path = Storage::putFileAs($file_buku_tabungan, $file_buku_tabungan_name);
        $dataBank['file_buku_tabungan'] = $file_buku_tabungan_path;
        Lembaga::query()->where('id_lembaga', Session::get('id_lembaga'))->update($dataBank);
        return redirect()->back()->withSuccess('Data Berhasil Disimpan');
    }
}

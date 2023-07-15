<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Lembaga;
use App\Models\Proposal;
use App\Models\Rab;

class DaftarHibahController extends Controller
{
    // public function _construct(){
    //     $this->display_menu = [
    //         'daftar_hibah' => true,
    //         'rab' => false,
    //         'propsal' => false,
    //         'history' => false,
    //         'bank' => false
    //     ];
    // }

    public function index(){
        return view('SibahNU.daftarHibabh.dafatarHibah');
    }

    public function detailHibah(){
        return view(route('bank'));
        // if(!session()->get('id_lembaga')){
        //     Alert::error('Oops!', 'Data Lembaga Belum Lengkap');
        // }
        // $DataBank = Lembaga::query()->where('id_lembaga',Session::get('id_lembaga'))->first();
        // $dataProposal = Proposal::query()->where('lembaga', Session::get('id_lembaga'))->first();
        // $dataRab = Rab::query()->wherey('proposal', $dataProposal->id_proposal)->get() ?? new Rab;
        // $data = [
        //     'dataBank' => $DataBank ?? new Lembaga,
        //     'dataProposal' => $dataProposal ?? new Proposal,
        //     'dataRab' => $dataRab,
        //     'no' => $count = 1,
        //     'display_menu' => $this->display_menu
        // ];
        // return view('SibahNU.detailHibah',$data);
    }

    // public function AddDataBank(Request $request){
    //     $rules = [
    //         'bank' => 'required',
    //         'no_rek' => 'required',
    //         'nama_rekening' => 'required',
    //         'cabang_bank' => 'required',
    //         'file_buku_tabungan' => 'required|max:2048'
    //     ];

    //     $message = [
    //         'bank.required' => 'Bank Harus Diisi',
    //         'no_rek.required' => 'No Rekening Harus Diisi',
    //         'nama_rekening.required' => 'Nama Rekening Harus Diisi',
    //         'cabang_bank' => 'Cabang Bank Harus Diisi',
    //         'file_buku_tabungan.required' => 'Buku Tabungan Harus Di Upload',
    //         'file_buku_tabungan.max' => 'Ukruan File Harus 2MB'
    //     ];

    //     $validated = Validator::make($request->all(), $rules,$message);
    //     if($validated->fails()){
    //         return redirect()->back()->withErrors($validated);
    //     }

    //     $dataBank = $validated->validate();
    //     $file_buku_tabungan = $request->file('file_buku_tabungan');
    //     $file_buku_tabungan_name = $file_buku_tabungan->getClientOriginalName();
    //     $file_buku_tabungan_path = Storage::putFileAs($file_buku_tabungan, $file_buku_tabungan_name);
    //     $dataBank['file_buku_tabungan'] = $file_buku_tabungan_path;
    //     Lembaga::query()->where('id_lembaga', Session::get('id_lembaga'))->update($dataBank);
    //     return redirect()->back()->withSuccess('Data Berhasil Disimpan');
    // }

    // function addRab(Request $request) {
    //     $proposal = Proposal::query()->where('lembaga', session()->get('id_lembaga'))->first();
    //     $rules = [
    //         'uraian'=> 'required|regex:/^[a-zA-Z\s.-]+$/',
    //         'satuan'=> 'required|regex:/^[a-zA-Z\s.-]+$/',
    //         'qty'=> 'required',
    //         'harga' => 'required'
    //     ];

    //     $message = [
    //         'uraian.required' => 'Uraian harus Diisi',
    //         'uraian.regex' => 'Format Uraian Harus Abjad',
    //         'satuan.required' => 'Satuan harus Diisi',
    //         'satuan.regex' => 'Format Satuan Harus Abjad',
    //         'qty.required' => 'Jumlah minimal 1',
    //         'harga.required' => 'Harga harus Diisi'
    //     ];

    //     $validated = Validator::make($request->all(), $rules, $message);
    //     if ($validated->fails()) {
    //         return redirect()->back()->withErrors($validated)->withInput($request->all());
    //     }

    //     $data = $validated->validate();
    //     if($request->id_rab) {
    //         Rab::where('id_rab', $request->id_rab)
    //             ->update($data);
    //         return redirect()->back()->withSuccess('Data Berhasil Diupdate');
    //     }
    //     $total = (int)$data['qty'] * (int)$data['harga'];
    //     $data['total'] = $total;
    //     $data['proposal'] = $proposal->id_proposal;
    //     Rab::create($data);
    //     return redirect()->back()->withSuccess('Data Berhasil Disimpan');
    // }
}

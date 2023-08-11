<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use App\Models\PengurusLembaga;
use App\Models\UserLembaga;
use App\Models\Wilayah;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function index() 
    {
        $user_list = UserLembaga::select(['user_lembaga.id_lembaga','ru.nama_mwc', 'l.alamat_lembaga', 'l.kecamatan'])
        ->leftJoin('lembaga as l', 'l.id_lembaga', '=', 'user_lembaga.id_lembaga')
        ->leftJoin('register_user as ru', 'ru.nik', '=', 'user_lembaga.user_nik')
        ->addSelect(DB::raw('NULL as status'))
        ->get();
        $lembaga_list = $user_list->map(function ($item) {
            $item->status = $this->cekStatus($item->id_lembaga);
            if ($item->kecamataan)
            {
                $kecamatan = Wilayah::where('kode',$item->kecamataan)->first();
                $item->kecamatan = $kecamatan->nama;
            }
            return $item;
        });

        // dd($lembaga_list);
        $data = [
            'lembaga_list' =>$lembaga_list
        ];

        return view('SibahNU.admin.home', $data);
    }

    function getDetail (Request $request) {
        $id_lembaga = $request->get('id_lembaga');
        $lembaga = Lembaga::where('id_lembaga', $id_lembaga)->first();
        if ($lembaga)
            return response()->json($lembaga, 200);
        else 
            return response()->json([], 404);
    }


    private function cekStatus($id_lembaga) {

    $lembaga = Lembaga::where('id_lembaga',$id_lembaga)
        ->first();
    $pengurus = PengurusLembaga::where('lembaga', $id_lembaga)
        ->get();

    $status = "<p class='text-warning'>Belum Lengkap</p>";
    if ($lembaga && count($pengurus) > 1)
        $status = "<p class='text-success'>Lengkap</p>";

        return $status;
    }
}

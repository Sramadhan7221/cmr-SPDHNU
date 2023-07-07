<?php

namespace App\Http\Controllers;

use App\Models\RegisterUser;
use App\Models\Wilayah;
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
        $user = RegisterUser::query()->where('nik', session()->get('id_user'))->first();
        $data = [
            'user' => $user,
            'kabupaten' => Wilayah::query()->where('kode', "32.06")->first(['kode', 'nama']),
            'kecamatan' => Wilayah::query()->where('kode', $user->kecamatan)->first(['kode', 'nama']),
            'desa' => Wilayah::getDesa($user->kecamatan),
            'display_menus' => $this->display_menus
        ];
        return view('SibahNU.persyaratan', $data);
    }
}

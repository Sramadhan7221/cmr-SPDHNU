<?php

namespace App\Http\Controllers;

use App\Models\RegisterUser;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use SebastianBergmann\Type\FalseType;

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
        $data = [
            'user' => $user,
            'kabupaten' => Wilayah::query()->where('kode', "32.06")->first(['kode', 'nama']),
            'kecamatan' => Wilayah::query()->where('kode', $user->kecamatan)->first(['kode', 'nama']),
            'desa' => Wilayah::getDesa($user->kecamatan),
            'display_menus' => $this->display_menus
        ];
        return view('SibahNU.pimpinan', $data);
    }

    public function save(Request $request) 
    {
        
    }
}

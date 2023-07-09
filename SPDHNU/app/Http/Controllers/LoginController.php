<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RegisterUser;
use App\Models\UserLembaga;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function register(Request $request){
        if($request->method() == "GET"){
            $data = [
                'kecamatan' => Wilayah::getKecamatan()
            ];
            return view('register',$data);
        }

        $rules = [
            'nik' => 'required',
            'kecamatan'=> 'required',
            'nama' => 'required|regex:/^[\pL\s]+$/u|max:50',
            'nama_mwc' => 'required|max:50|regex:/^[\pL\s]+$/u',
            'email' => 'required|unique:register_user,email|email|max:50',
            'no_telp' => 'required|numeric',
            'password' => 'required|min:8',
        ];

        $message = [
            'nik.required' => 'NIK Harus Diisi',
            'kecamatan.required' => 'Kecamatan Harus Diisi',
            'nama.required' => 'Nama Harus Diisi',
            'nama_mwc.required' => 'Nama MWC Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'email.email' => 'Format Email Salah',
            'email.unique' => 'Email Sudah Terdaftar',
            'no_telp.required' => 'No Telephone Harus Diisi',
            'no_telp.numeric' => 'No Telepon Harus Numeric',
            'password.required' => 'Password Harus Diisi',
            'password.min' => 'Password Minimal 8 karakter'
        ];

        $validated = Validator::make($request->all(),$rules,$message);
        if($validated->fails()){
            return redirect()->back()->withErrors($validated)->withInput();
        }
        $data = $validated->validate();
        RegisterUser::query()->create($data);
        UserLembaga::query()->create(['user_nik'=>$data['nik']]);
        return redirect(route('login'))->with('success','Register Berhasil');

    }

    public function login(Request $request){
        if($request->method() == "GET"){
            return view('login');
        }

        $email = $request->input('email');
        $password = $request->input('password');
        $user = RegisterUser::query()->where('email',$email)->first();
        if(empty($user)){
            Alert::error('Oops!', 'Username Atau Password Salah!');
            return redirect()->back();
        }

        if(!Hash::check($password, $user->password)){
            Alert::error('Oops!', 'Password Tidak Cocok');
            return redirect()->back();
        }

        if(!session()->isStarted())
            session()->start();
            session()->put('logged','yes',true);
            session()->put('id_user',$user->nik);
            return redirect('home');
    }

    public function logout(){
        session()->flush();
        return redirect(route('login'));
    }
}

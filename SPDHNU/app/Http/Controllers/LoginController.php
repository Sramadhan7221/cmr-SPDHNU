<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\admin;
use App\Models\Wilayah;
use App\Models\UserLembaga;
use App\Models\RegisterUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
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

        $role = Role::query()->where('name','User')->first();

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
        $data['role_id'] = $role->role_id;
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
        $lembaga = UserLembaga::where('user_nik', $user->nik)->first();
        if(!session()->isStarted())
            session()->start();
            session()->put('logged','yes',true);
            session()->put('id_user',$user->nik);
            session()->put('id_admin',$user->role_id);
            session()->put('id_lembaga');
            if ($lembaga){
                session()->put('id_lembaga',$lembaga->id_lembaga);
            }
            if(Session::get('id_user'))
                return redirect(route('home'));
            if(Session::get('id_admin'))
                return redirect(route('daftarHibah'));

    }

    public function logout(){
        $title = 'Log Out!';
        $text = 'Anda Yakin Ingin Keluar?';
        confirmDelete($title,$text);
        session()->flush();
        return redirect(route('login'));
    }
}

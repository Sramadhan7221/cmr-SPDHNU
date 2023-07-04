<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function login(Request $request){
        if($request->method() == "GET"){
            return view('login');
        }

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::query()->where('email',$email)->where('password',$password)->first();
        if(empty($user)){
            Alert::error('Oops!', 'Username Atau Password Salah!');
            return redirect()->back();
        }

        if(!session()->isStarted())
            session()->start();
            session()->put('logged','yes',true);
            session()->put('id_user',$user->id);
            return redirect('home');
    }
}

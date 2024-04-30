<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('user/login');
    }
    

    public function login(Request $request){
        $data = [
            "username"=>$request->username,
            "password"=>$request->password
        ];
        if(Auth::guard('regists')->attempt($data)){
            $regist= Auth::guard('regists')->user();
            session(['user' => $regist->username]);
            return redirect('/user_home');
        }else{
            session()->flash('errors', ['Check Your Username And Password is Correct']);
            return redirect()->back();
        }


    }
    public function log(){
        return view('user/admin_login');
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function admin (Request $request){
        $admin = "admin";
        $pass = "123";
        if($request->username==$admin && $request->password == $pass){
            return redirect('/admin');
        }else{
            session()->flash('errors', ['Check Your Username And Password is Correct']);
            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Regist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class RegistController extends Controller
{
    public function index(){
        return view('user/register');
    }

    public function save(Request $request){
      
        $user= new Regist();
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect('/login');
    }


    
}

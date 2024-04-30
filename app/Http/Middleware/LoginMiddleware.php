<?php

namespace App\Http\Middleware;

use App\Models\Regist;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Symfony\Component\HttpFoundation\Response;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      
        $username = $request->username;
        $password = $request->password;
        if(empty($username)||empty($password)){
            session()->flash('errors', ['Username and password cannot be empty']);
            return redirect()->back();
        }
        $user = Auth::user();

        if ($user) {
            $username = $user->username;

            // Logika untuk menentukan tampilan berdasarkan username
            if ($username === 'adrian') {
                // Tampilkan tampilan untuk user adrian
                return redirect('/order/adrian');
            } elseif ($username === 'viko') {
                // Tampilkan tampilan untuk user viko
                return redirect('/order/viko');
            }
        }
       


        return $next($request);
    }
}

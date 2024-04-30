<?php

namespace App\Http\Middleware;

use App\Models\Regist;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegistMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $existingUser = Regist::where('username', $request->username)->first();
        $username = $request->username;
        $password = $request->password;
        if(empty($username)||empty($password)){
            session()->flash('errors', ['Username and password cannot be empty']);
            return redirect()->back();
        }
        if($existingUser){
            session()->flash('errors', ['Username is already']);
            return redirect()->back();
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use App\Models\Genre;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GenreMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $genre = Genre::where('genre_name',$request->genre_name)->first();
        if($genre){
            session()->flash('errors', ['Genres already listed']);
            return redirect()->back();
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class GenreController extends Controller
{
    public function  index(){
        $genres = Genre::all(['id','genre_name'])->sortBy('id');
        return view('genre/index',['genres'=>$genres]);
    }
    
    public function add(){
        return view('genre/form');
    }
    
    public function save(Request $request) {
        if (isset($request->id)) {  // use existing
           $genre = Genre::find($request->id);
        } else {
           $genre = new Genre();
        }
        $genre->genre_name = $request->genre_name;
        $genre->save();
        return redirect("/genre");
    }
    public function update(string $id){
        $genre = Genre::find($id);
        return view('genre/form',['genre'=>$genre]);
    }
    public function delete(Request $request) {
        if ($request->method() == "POST") {
            $genre = Genre::find($request->id)->delete();
            return redirect("/genre");
        } else {
            $genre = DB::table("genres")->find($request->id);
            return view("genre/delete", ["genre" => $genre]);
        }
    }
 
}

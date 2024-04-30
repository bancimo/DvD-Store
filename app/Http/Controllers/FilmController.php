<?php

namespace App\Http\Controllers;

use App\Models\Film;
// use App\Models\Genre;
use App\Models\Genre;
use App\Models\Stok;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class FilmController extends Controller
{
    public function index(){
        $films = Film::with('genres')->get();
        return view('admin/index',['films'=>$films]);
    }

    public function add(){
        $genres = Genre::all(['id','genre_name']);
        return view('admin/form',['genres'=>$genres]);
    }
    
    public function save(Request $request){
        if (isset($request->id)) {  // use existing
            $film = Film::find($request->id);
        } else {
            $film = new Film();  // create a new one
        }
        $film->title = $request->title;
        $film->director = $request->director;
        $film->duration = $request->duration;
        $film->release_date = $request->release_date;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time(). '.' . $photo->getClientOriginalExtension();
            $destinationPath = public_path('/photos');
            $photo->move($destinationPath, $filename);
            $film->photo = $filename;
        }
        if($request->hasFile('video')){
            $video = $request->file('video');
            $filename = time(). '.' . $video->getClientOriginalExtension();
            $destinationPath = public_path('/videos');
            $video->move($destinationPath, $filename);
            $film->video = $filename;
        } 
        $film->save();
        $film->genres()->sync($request->genres,['film_id'=>$film->id]);
        return redirect('/admin');
    }
    
    public function update(string $id){
        $film = Film::find($id);
        $genres = Genre::all(['id','genre_name']);
        return view('admin/form',['film'=>$film,'genres'=>$genres]);
    }

    public function delete(Request $request) {
        if ($request->method() == "POST") {
            $film = Film::find($request->id)->delete();
            $stok = Stok::with('films')->where('film_id',$request->id)->delete();
            return redirect("/admin");
        } else {
            $film= DB::table("films")->find($request->id);
            return view("admin/delete", ["film" => $film]);
        }
    }

    
}

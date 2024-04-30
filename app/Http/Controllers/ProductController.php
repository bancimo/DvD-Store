<?php

namespace App\Http\Controllers;

// use App\Models\Customer;
use Illuminate\Support\Facades\Auth;


use App\Models\Film;
use App\Models\Order;
use App\Models\Regist;
use App\Models\Stok;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index(){
        $films = Film::with('genres','stoks')->get();
        $regist = session('user');
        $id = Regist::all('id')->first();
        $order = Order::all('id')->first();
        return view('user/home',['films'=>$films,'nama'=>$regist,'id'=>$id,'order'=>$order]);
    }

    public function add(string $id){
        $film = Film::with('stoks')->find($id);
        $stok = $film->stoks;
        return view('user/order',['film'=>$film,'stok'=>$stok]);
    }

    public function order(Request $request,string $id){
        $film_stok = Film::with('stoks')->find($id);
        $user = Auth::guard('regists')->user();
        $order = new Order();
        // $stok =  Stok::find($id);
        foreach($film_stok->stoks as $stok){
            $order->stok_id= $stok->id;
            $stok->jumlah -= $request->quantity;
            $stok->save();
        }
        $order->regist_id = $user->id; 
        $order->alamat = $request->alamat;
        $order->jumlah_dibeli = $request->quantity;
        $order->no_telepon = $request->noHP;
        $order->save();
        return redirect('/user_home');
    }
    
    public function detail(){
        $users = Auth::guard('regists')->user();
        $orders = Order::where('regist_id',$users->id)->with(['stoks.films'])->get();
        return view('user/order_detail',["orders"=>$orders,'user'=>$users]);
    }
}

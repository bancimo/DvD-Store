<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\StokController;
use App\Http\Middleware\FilmMiddleware;
use App\Http\Middleware\GenreMiddleware;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Middleware\RegistMiddleware;
// use Illuminate\Auth\Events\Login;
// use App\Models\Stok;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Menampilkan Home Page
Route::get('/', function () {
    return view('user/index');
});


Route::get('/register',[RegistController::class,'index']);
Route::post('/register/save',[RegistController::class,'save'])->middleware(RegistMiddleware::class);
Route::get('/login',[LoginController::class,'index']);
Route::post('/user/login',[LoginController::class,'login'])->middleware(LoginMiddleware::class);
Route::get('user/logout',[LoginController::class,'logout']);


// Routes Genre
Route::get('/genre',[GenreController::class,'index']);
Route::get('/genre/add',[GenreController::class,'add']);
Route::post('/genre/save',[GenreController::class,'save'])->middleware(GenreMiddleware::class);
Route::get('/genre/update/{id}',[GenreController::class,'update']);
Route::get('/genre/delete/{id}',[GenreController::class,'delete']);
Route::post('/genre/delete/{id}',[GenreController::class,'delete']);

// Routes  Stok
Route::get('/stok',[StokController::class,'index']);
Route::get('/stok/add',[StokController::class,'add']);
Route::post('/stok/save',[StokController::class,'save']);
Route::get('/stok/update/{id}',[StokController::class,'update']);
Route::get('/stok/delete/{id}',[StokController::class,'delete']);
Route::post('/stok/delete/{id}',[StokController::class,'delete']);

// Routes User
Route::get('/user_home',[ProductController::class,'index']);
Route::get('/user/order/{id}',[ProductController::class,'add']);
Route::post('/user/film_order/{id}',[ProductController::class,'order']);
Route::get('/user/detail_order',[ProductController::class,'detail']);

// Routes Admin
Route::get('/admin/log',[LoginController::class,'log']);
Route::post('/admin/login',[LoginController::class,'admin'])->middleware(LoginMiddleware::class);
Route::get('/admin',[FilmController::class,'index']);
Route::get('/admin/add',[FilmController::class,'add']);
Route::post('/admin/save',[FilmController::class,'save']);
Route::get('/admin/update/{id}',[FilmController::class,'update']);
Route::get('/admin/delete/{id}',[FilmController::class,'delete']);
Route::post('/admin/delete/{id}',[FilmController::class,'delete']);

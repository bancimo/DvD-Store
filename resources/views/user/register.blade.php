@extends('layouts.user')
@section('title','Regist')

@section('home')
<div id="carouselExampleInterval " class="carousel slide  image" data-bs-ride="carousel">
    <div class="carousel-inner  ">
      <div class="carousel-item active" data-bs-interval="3000">
        <img src="img/dune.png" class="d-block " alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="img/indiana.png" class="d-block " alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="img/deadpool.png" class="d-block" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="img/conjuring.png" class="d-block" alt="...">
      </div>
    </div>
    {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button> --}}
  </div>
  
  <div class="wrapper">
    <form action="/register/save" method="post">
      @csrf
        <h3>Regist</h3>
          <div class="d-flex flex-column justify-content-center align-items-center  regist_input">
              <input type="text" name="username" placeholder="Username">
          </div>
          <div class="d-flex flex-column justify-content-center align-items-center regist_input">
              <input type="password" name="password" placeholder="Password" id="sandi">
          </div>

          <div class="remember">
              <label><input type="checkbox" id="klik"  onclick="show()" > Show password</label>
          </div>  

          @if(session('errors'))
          <div class="alert alert-danger">
              <ul>
                  @foreach(session('errors') as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
         <div class="container d-flex justify-content-center">
            <button class="btn btn-primary w-50 rounded-2" type="submit">Regist</button>
         </div>
      </form>
  </div>
@endsection
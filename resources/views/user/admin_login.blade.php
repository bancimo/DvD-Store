@extends('layouts.user')
@section('home')
<div id="carouselExampleInterval" class="carousel slide  image" data-bs-ride="carousel">
  <div class="carousel-inner  ">
    <div class="carousel-item active" data-bs-interval="3000">
      <img src="../img/dune.png" class="d-block " alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="3000">
      <img src="../img/indiana.png" class="d-block " alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="3000">
      <img src="../img/deadpool.png" class="d-block" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="3000">
      <img src="../img/conjuring.png" class="d-block" alt="...">
    </div>
  </div>
</div>

<div class="wrapper">
  <form action="/admin/login" method="post">
    @csrf
      <h3>Admin</h3>
        <div class="d-flex flex-column justify-content-center align-items-center  regist_input">
            <input type="text" name="username" placeholder="Username">
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center regist_input">
            <input type="password" name="password" placeholder="Password" id="sandi">
        </div>

        <div class="remember">
            <label><input type="checkbox" id="klik"  onclick="show()" > Show password</label>
        </div>  
        {{-- <a href="/admin/log">Login by Admin</a> --}}

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
          <button class="btn btn-primary w-50 rounded-2" type="submit">Login</button>
       </div>
    </form>
</div>
    
@endsection






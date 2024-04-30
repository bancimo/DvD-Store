@extends('layouts.user')

@section('home')
<div id="carouselExampleInterval" class="carousel slide  image" data-bs-ride="carousel">
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
  </div>

@endsection

@extends('layouts.main')
@section('title','Admin')

@section('content')
<div class="container mt-5">
    <h1>Welcome Admin</h1>
</div>
  <div class="container" id="menu">
    <div class="row">
            @foreach ($films as $film)
            <div class="col-md-4">
              <img src="/photos/{{$film['photo']}}" class="w-100 mt-3 rounded-4"  >
                <div>
                    <p style="font-size: 25px;" class="text-center">{{$film['title']}}</p>
                    <p style="font-weight: 400; font-size: 15px;">Director : {{$film['director']}}</p>
                    <p style="font-weight: 400; font-size: 15px;">Duration : {{$film['duration']}}</p>
                    <p style="font-weight: 400; font-size: 15px;">Release Date : {{$film['release_date']}}</p>
                    <p style="font-weight: 400; font-size: 15px;">Genre :
                      @foreach ($film->genres as $genre)
                       {{ $genre->genre_name }}
                       @if (!$loop->last)
                         ,
                       @endif
                     @endforeach
                      </p>
                    <button type="submit" class="btn btn-primary">
                      <a href="/admin/update/{{$film->id}}" class="nav-link">Edit</a></button>
                    <button type="submit" class="btn btn-danger">
                      <a href="/admin/delete/{{$film->id}}" class="nav-link">Delete</a></button>
                </div>
                
            </div>
            @endforeach
    </div>
  </div>
    
@endsection

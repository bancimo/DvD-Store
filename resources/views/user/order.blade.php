@extends('layouts.user_home')



@section('content')
<div class="row mt-4">
    <div class="col-4 offset-4">
      
        <form action="/user/film_order/{{$film->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @if (!empty($film?->id))
            <input type="hidden" name="id" value="{{ $film->id }}"/>
            @endif
         
            <div class="mb-3">
                <label for="title" style="color: aliceblue">Title: </label>
                <input type="text" name="title" id="title" class="form-control" placeholder="{{$film->title}}" disabled>
            </div>
            <div class="mb-3">
                @foreach ($stok as $item)
                <label for="quantity" style="color: aliceblue;">Stok Available: {{$item->jumlah}}</label>
                <input type="number" name="quantity" id="director" min="0" max = {{$item->jumlah}} class="form-control" required>    
                @endforeach
            </div>
        
            <div class="mb-3">
                <label for="release_date" style="color: aliceblue">No Contact:</label>
               <input type="tel" name="noHP" required >
            </div>
            
            <div class="mb-3">
                <label for="time" style="color: aliceblue">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="4" required></textarea>
                   
            </div>
       
            
        
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Save</button>
                <a href="/admin" class="btn btn-warning">Cancel</a>
            </div>
         <div class="mt-4">
             @if (!empty(session("error")))
                 {{ session("error", "") }}
             @endif
         </div>
     </form>
 </div>
 </div>
@endsection
@extends('layouts.user_home')

@section('content')
    <div class="container mt-5">
    <h1>Welcome {{$nama}}</h1>
    {{-- @if (!empty($order->id))
    <button class="btn btn-danger ms-auto " style="width: 130px;" type="submit"><a href="/user/detail_order/{{$order->id}}" class="nav-link text-light">Detail Order</a></button>
    @endif --}}
    {{-- <h2>{{$id}}</h2> --}}
</div>

  <div class="container" id="menu">
    <div class="row">
        
            @foreach ($films as $film)
            <div class="col-md-4">
              <video id="myVideo" class="object-fit-fill rounded" controls width="350" poster="/photos/{{$film['photo']}}">
                <source src="/videos/{{ $film['video'] }}" type="video/mp4">
            </video>
                <div class="mt-3">
                    <p style="font-size: 25px;" class="text-center">{{$film['title']}}</p>
                    <p style="font-weight: 400; font-size: 15px;">Genre :
                      @foreach ($film->genres as $genre)
                       {{ $genre->genre_name }}
                       @if (!$loop->last)
                         ,
                       @endif
                     @endforeach
                      </p>
                        <p style="font-weight: 400; font-size: 15px;">Stok : 
                        @foreach ($film->stoks as $stok)
                            
                            @if ($stok->jumlah != 0)
                            {{$stok->jumlah}}
                            @else
                                <span style="color: red">Unavailable</span> 
                            @endif
                         
                        @endforeach
                        </p>
                    <p style="font-weight: 400; font-size: 15px;">Director : {{$film['director']}}</p>
                    <p style="font-weight: 400; font-size: 15px;">Duration : {{$film['duration']}}</p>
                    <p style="font-weight: 400; font-size: 15px;">Release Date : {{$film['release_date']}}</p>
                    <button type="submit" class="btn btn-primary" @if ($stok->jumlah == 0)
                        @disabled(true)
                    @endif>
                      <a href="/user/order/{{$film->id}}" class="nav-link">Order</a>
                    </button>
 
                </div>
            </div>
            @endforeach
    </div>
  </div>
    
@endsection
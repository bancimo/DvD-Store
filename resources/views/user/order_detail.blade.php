@extends('layouts.user_home')
{{-- @section('title','De') --}}

@section('content')
<div class="container mt-3">
    {{-- <a href="/s" class="btn btn-primary">Add Stok</a> --}}
    <table class="table table-sm table-bordered mt-4 table-dark">
        <thead>
            <tr>
                <th>Name</th>
                <th>Movie</th>
                <th>Quantity</th>
                <th>Address</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $item)
            <tr>
              <td>{{$user->username }}</td>
              <td>{{$item->stoks->films->title}}</td>
              <td>{{$item->jumlah_dibeli}}</td>
              <td>{{$item->alamat}}</td>
              <td>{{$item->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
 </div>
@endsection
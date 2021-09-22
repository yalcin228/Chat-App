@extends('layouts.app')

@section('content')
<div class="card text-center" style="width: 100%;">
    @if (Session::has('addfr'))
        <div class="container">
            <div class="alert alert-success"> {{ Session::get('addfr') }}</div>
        </div>
    @endif
    <a href="{{route('home')}}" class="btn btn-primary"  style="position:absolute; float-left"><-</a>
    <img class="card-img-top rounded-circle" src="{{asset('storage').'/profile/'.$users->image}}" style="width: 150px!important;height:150px;margin:auto;"  alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{$users->name}}&nbsp;&nbsp;{{$users->surname}}</h5>
      <p class="card-text">YAS:&nbsp;@if ($users->age)
        {{$users->age}}
      @else
          Qeyd edilmeyib
      @endif </p>
      <a href="{{url('/user-info/addfriend'.'/'.$users->id)}}" class="btn btn-success text-white">Dostluq yolla</a>
      <a class="btn btn-danger text-white">Dostlugu sil</a>
    </div>
  </div>
@endsection

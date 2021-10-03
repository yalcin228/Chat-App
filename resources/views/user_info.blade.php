@extends('layouts.app')

@section('content')
<div class="card text-center" style="width: 100%;">
    @if (Session::has('action_status'))
        <div class="container">
            <div class="alert alert-success"> {{ Session::get('action_status') }}</div>
        </div>
    @endif
    <a href="{{route('home')}}" class="btn btn-primary"  style="position:absolute; float-left"><-</a>
    <img class="card-img-top rounded-circle" src="{{asset('storage').'/profile/'.$user->image}}" style="width: 150px!important;height:150px;margin:auto;"  alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{$user->name}}&nbsp;&nbsp;{{$user->surname}}</h5>
      <p class="card-text">YAS:&nbsp;
        @if ($user->age)
          {{$user->age}}
        @else
          Qeyd edilmeyib
        @endif 
      </p>
      
     
          @if(!$isFriend)
            <a href="{{route('add', $user->id)}}" class="btn btn-success text-white">Dostluq yolla</a>
          @else
            <a href="{{route('delete', $user->id)}}" class="btn btn-danger text-white">Sorgunu sil</a>
          @endif
      
         
      
     

    </div>
  </div>
@endsection

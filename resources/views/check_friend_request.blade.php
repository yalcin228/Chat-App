@extends('layouts.app')

@section('content')
<div class="card text-center" style="width: 100%;">
    
    <a href="{{route('home')}}" class="btn btn-primary"  style="position:absolute; float-left"><-</a>
    <img class="card-img-top rounded-circle" src="{{asset('storage').'/profile/'.$user->image}}" style="width: 150px!important;height:150px;margin:auto;"  alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{$user->name}}&nbsp;&nbsp;{{$user->surname}}</h5>
      <p class="card-text">YAS:&nbsp;@if ($user->age)
        {{$user->age}}
      @else
          Qeyd edilmeyib
      @endif </p>
      
        <div class="d-flex justify-content-center ">
            <form class="mr-3" action="{{route('check-friend.update',$user->id)}}" method="POST">
                @csrf
                @method('PUT')
            
                <button type="submit" style="min-width: 100px;" class="btn btn-success">Onayla</button>
            </form>

            <form action="{{route('check-friend.destroy',$user->id)}}" method="POST">
                @csrf
                @method('DELETE')
                
                <button style="min-width: 100px;" type="submit" class="btn btn-danger">Sil</button>
            </form>
        </div>
    </div>
</div>


@endsection
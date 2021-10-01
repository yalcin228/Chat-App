@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="display-4 text-center">Dostlarım</h1>

    <div class="row">
      
       @foreach ($my_friends as $item)
            @if ($item->from_id == user()->id)
                
            <div class="col-lg-3 col-md-6">
                <div class="card m-auto" style="width: 18rem;">
                    <img src="{{asset('storage').'/profile/'.$item->user_to->image}}" style="height:286px;width:286px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->user_to->name}}&nbsp;{{$item->user_to->surname}}</h5>
                        <p class="card-text">YAS:&nbsp;@if ($item->user_to->age)
                            {{$item->user_to->age}}
                          @else
                              Qeyd edilmeyib
                          @endif </p>
                        <a href="{{route('personal_message.show',$item->to_id)}}" class="btn btn-primary">Şəxsi Mesaj Göndər</a>
                    </div>
                </div>
            </div>
               
            @else
        
            <div class="col-lg-3 col-md-6">
                <div class="card m-auto" style="width: 18rem;">
                    <img src="{{asset('storage').'/profile/'.$item->user->image}}" style="height:286px;width:286px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->user->name}}&nbsp;{{$item->user->surname}}</h5>
                        <p class="card-text">YAS:&nbsp;@if ($item->user->age)
                            {{$item->user->age}}
                          @else
                              Qeyd edilmeyib
                          @endif </p>
                        <a href="{{route('personal_message.show',$item->from_id)}}" class="btn btn-primary">Şəxsi Mesaj Göndər</a>
                    </div>
                </div>
            </div>           
           
            @endif()
        @endforeach
        
       
        
    </div>
</div>
       

@endsection
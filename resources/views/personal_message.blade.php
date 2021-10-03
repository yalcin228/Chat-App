@extends('layouts.app')

@section('content')
      
 <div class="container py-5 px-4">

  @if(Session::has('success'))
    <div class="alert alert-success"> {{ session::get('success') }}</div>
  @endif

 
  
    <div class="row rounded-lg overflow-hidden shadow">
      <!-- Users box-->
      <div class="col-5 px-0">
        <div class="bg-white">
          <div class="messages-box" style="height: 510px;overflow-y: auto;">
            <div class="list-group rounded-0">
              
              
            
                <a href="" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                  <div class="media"><img src="{{asset('storage').'/profile/'.$my_friend->image}}" alt="user" width="50" class="rounded-circle">
                   <div class="media-body ml-4">
                     <div class="d-flex align-items-center justify-content-between mb-1">
                       <h6 class="mb-0" >{{$my_friend->name}} &nbsp;{{$my_friend->surname}} </h6><!--<small class="small font-weight-bold">14 Dec</small>-->
                     </div>
                     <p class="font-italic text-muted mb-0 text-small">{{$my_friend->updated_at->diffForHumans()}} aktividi</p>
                   </div>
                 </div>
                </a>
             
              
            </div>
          </div>
        </div>
      </div>
      <!-- Chat Box-->
      <div class="message-container col-7 px-0">
        <div class="px-4 py-5 chat-box bg-white" id="ajax" style="height: 510px;overflow-y: auto;">
         
          @foreach ($personal_message as $item)
              
             @if ($item->from_id != user()->id)
              

            <!-- Sender Message-->
                <div class="media w-50 mb-3"><img src="{{asset('storage').'/profile/'.$item->getUser->image}}" width="50" class="rounded-circle">
                  <div class="media-body ml-3">
                    <div class="bg-light rounded py-2 px-3 mb-2" id="ajax_message">
                      <h5>{{$item->getUser->name}} &nbsp; {{$item->getUser->surname}}</h5>
                        <p class="text-small mb-0 text-muted">{{$item->message}}</p>
                    </div>
                    <p class="small text-muted">{{$item->created_at->format('H:i | M d')}}</p>
                  </div>
                </div>

             @else
                     <!-- Reciever Message-->
                  <div class="media w-50 ml-auto mb-3">
                    <div class="media-body" id="tekrar">
                        <div class="bg-primary rounded py-2 px-3 mb-2">
                          <p class="text-small mb-0 text-white">{{$item->message}}</p>
                        </div>
                          <p class="small text-muted">{{$item->created_at->format('H:i | M d')}}</p>
                    </div>               
                  </div>
             @endif
              


              
               
                 
          @endforeach
           
         
      </div>
        <!-- Typing area -->
      <form action="{{route('personal_message.update',$my_friend->id)}}" method="post"   id="add_message" class="bg-light">
        @csrf
        @method('PUT')
        <div class="input-group">
          <input type="text" id="message" name="message" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
          <div class="input-group-append">
            <button type="submit"  class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
          </div>
        </div>
      </form>
    </div>
</div> 

<script>
  function scroolBottom(){
    $('#ajax').animate({scrollTop:1000000},510);
  }
  $(document).ready(function(){
    scroolBottom();
  });
</script>
@endsection

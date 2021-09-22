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
              
              
              @foreach ($user as $item)
              
                @if (auth()->user()->id == $item->id)
                    
                @else
                <a href="{{url('/user-info/'.$item->id)}}" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                  <div class="media"><img src="{{asset('storage').'/profile/'.$item->image}}" alt="user" width="50" class="rounded-circle">
                   <div class="media-body ml-4">
                     <div class="d-flex align-items-center justify-content-between mb-1">
                       <h6 class="mb-0" >{{$item->surname }}&nbsp;{{$item->name}}</h6><!--<small class="small font-weight-bold">14 Dec</small>-->
                     </div>
                     <p class="font-italic text-muted mb-0 text-small">{{$item->updated_at->diffForHumans()}} aktividi</p>
                   </div>
                 </div>
                </a>
                @endif
                
            

              @endforeach
              
            </div>
          </div>
        </div>
      </div>
      <!-- Chat Box-->
      <div class="col-7 px-0">
        <div class="px-4 py-5 chat-box bg-white" id="ajax" style="height: 510px;overflow-y: auto;">
         
        @foreach ($message as $item)
             @if (auth()->user()->id != $item->user_id)
              
                <!-- Sender Message-->
                <div class="media w-50 mb-3"><img src="{{asset('storage').'/profile/'.$item->getUser->image}}" alt="{{$item->getUser->name}}" width="50" class="rounded-circle">
                  <div class="media-body ml-3">
                    <div class="bg-light rounded py-2 px-3 mb-2" id="ajax_message">
                      <h5>{{$item->getUser->name}} {{$item->getUser->surname}}</h4>
                        <p class="text-small mb-0 text-muted">{{$item->message}}</p>
                  </div>
                  <p class="small text-muted">{{$item->created_at->format('H:i | M d')}}</p>
                  </div>
                </div>
                
             @else
    
               <!-- Reciever Message-->
               <div class="media w-50 ml-auto mb-3">
                <div class="media-body">
                  <div class="bg-primary rounded py-2 px-3 mb-2">
                    <p class="text-small mb-0 text-white">{{$item->message}}</p>
                  </div>
                  <p class="small text-muted">{{$item->created_at->format('H:i | M d')}}</p>
                </div>
              </div>
                 
             @endif
        
         

        

  
         

        @endforeach
         
        <!-- Typing area -->
        <form  method="POST" action="" id="add_message" class="bg-light">
          @csrf
          <div class="input-group">
            <input type="text" id="message" name="message" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
            <div class="input-group-append">
              <button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
            </div>
          </div>
        </form>
  
      </div>
    </div>
</div> 

 
{{-- <script>
    $(document).ready(function(){
        $('#add_message').submit(function(e){
          e.preventDefault();

          let message=$('#message').val();

          $.ajax({
            url: "{{route('send_message')}}",
            type: "POST",
            data: {message:message},

            success:function(response){
              if(response){
                $('#ajax').append(
                 
               
                )
              }
            }
          });
        });
    })
    
</script> --}}
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row ">
                        <div class="col-md-8">salam Men yalcin</div>
                        <div class="col-md-12 d-flex justify-content-end mb-3 ">Salam mende yalcin</div>
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="text" class="form-control">
                                <div class="input-group-append">
                                  <button class="btn btn-success" type="button">Gonder</button>
                                </div>
                              </div>
                        </div>
                    </div>
                   
                    
                    
                </div>           
            </div>

           
        </div>
    </div>
</div>
-->
@endsection

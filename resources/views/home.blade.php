@extends('layouts.app')

@section('content')
      
 <div class="container py-5 px-4">

  @if(Session::has('success'))
    <div class="alert alert-success"> {{ session::get('success') }}</div>
  @endif
    
  @if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $item)
            <li>{{$item}}</li>
        @endforeach
    </div>
  @endif

 
  
    <div class="row rounded-lg overflow-hidden shadow">
      <!-- Users box-->
      <div class="col-5 px-0">
        <div class="bg-white">
          <div class="messages-box" style="height: 510px;overflow-y: auto;">
            <div class="list-group rounded-0">
              
              
              @foreach ($users as $item)
              
                @if (user()->id == $item->id)
                    
                @else
                <a href="{{url('/user-info/'.$item->id)}}" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                  <div class="media"><img src="{{asset('storage').'/'.$item->image}}" alt="user" width="50" class="rounded-circle">
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
      <div class="message-container col-7 px-0">
        <div class="px-4 py-5 chat-box bg-white" id="ajax" style="height: 510px;overflow-y: auto;">
         
        @foreach ($messages as $item)
             @if (user()->id != $item->user_id)
              
                <!-- Sender Message-->
                <div class="media w-50 mb-3"><img src="{{asset('storage').'/'.$item->getUser->image}}" alt="{{$item->getUser->name}}" width="50" class="rounded-circle">
                  <div class="media-body ml-3">
                    <div class="bg-light rounded py-2 px-3 mb-2" id="ajax_message">
                      <h5>{{$item->getUser->name}} {{$item->getUser->surname}}</h5>
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
      <form   id="add_message" class="bg-light">
        <div class="input-group">
          <input type="text" id="message" name="message" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
          <div class="input-group-append">
            <button id="button-addon2"  class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
          </div>
        </div>
      </form>
    </div>
</div> 




  <script>




     $.ajaxSetup({
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
         }
       });

    $(document).ready(function(){
        $('#add_message').submit(function(e){
          e.preventDefault();

          let message=$('#message').val();
          let data={
            '_token':$('meta[name=csrf-token]').attr('content'),
            message
          };
          

         $.ajax({
                type:"POST",
                dataType: "json",
                url:"{{route('add-message')}}",
                data: data,

                success:function(response){              
                    $.each(response,function(key,value){

                      $('#ajax').append("<div class='media w-50 ml-auto mb-3'><div class='media-body' id='tekrar'><div class='bg-primary rounded py-2 px-3 mb-2'><p class='text-small mb-0 text-white'>"+value.message+"</p></div><p class='small text-muted'>"+value.created_at+"</p></div></div>");                     
                      scroolBottom();
                      resetForm();
                    })   
                                  
                }
          });
         
        });
        
        
    })


    
function scroolBottom()
{
  $('#ajax').animate({scrollTop:1000000},510);
}

function resetForm() 
{
	$('#add_message')[0].reset();
}

$(document).ready(function(){
  scroolBottom();
})

</script> 

@endsection

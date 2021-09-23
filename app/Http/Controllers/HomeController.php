<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\AddFriend;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   

    public function index()
    {
        
        $user=User::all();
        $message=Message::orderBy('created_at','ASC')->with('getUser')->get();
        
        return view('home',compact('message'))->with('user',$user);
    }
    
    public function add_message(Request $request){
       $mesaj=new Message();
       
       $id=auth()->user()->id;
       $mesaj->user_id = $id;
       $mesaj->message = $request->message;
       $mesaj->save();

       return redirect()->route('home');

    }

}

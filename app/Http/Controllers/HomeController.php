<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Friend;
use App\Requests\AddMessageRequest;

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
        $users=User::all();
        $messages=Message::orderBy('created_at','ASC')->with('getUser')->get();
        
        return view('home',compact('messages','users'));
    }
    
    public function add_message(Request $request)
    {      
        $message=user()->messages()->create($request->all());
        
        return response()->json(['success' => $message], 200);   
    }

}

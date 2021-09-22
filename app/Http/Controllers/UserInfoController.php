<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AddFriend;
use Session;
use Illuminate\Support\Facades\DB;
class UserInfoController extends Controller
{
    public function index($id){
        $users=User::find($id);
        return view('user_info',compact('users'));
    }
    public function addfriend($id){
        
        $user_request = auth()->user()->id;
        
        $acceptor = $id; 
        
        $addfriend=new AddFriend();
        $addfriend->user_request=$user_request;
        $addfriend->acceptor=$acceptor;

        $addfriend->save();

        return view('user_info')->with('addfr','Dostluq isteyi yollandi');
    }

    public function deletefriend($id){
        $delete=DB::table('addfriend')->where('acceptor',$id)->delete();

        return back()->with('delfr','Dostluq isteyi geri cekildi');
    }

}

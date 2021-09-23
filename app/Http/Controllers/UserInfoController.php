<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddFriendRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AddFriend;
use Session;
use Illuminate\Support\Facades\DB;

class UserInfoController extends Controller
{
    public function index($id){
        $users=User::find($id);
        
        $userStatus = AddFriend::where('to_user', $id)->where('user_id',auth()->user()->id)->get();
       
        $status = false;
        if(count($userStatus)) {
            $status = true;
        }
        return view('user_info',compact('users', 'status'));
    }
    /**
     * Update the specified resource in storage.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function addFriend($id)
    {
        $user_id = auth()->user()->id;

        $data = [
            'user_id' => intval($user_id),
            'to_user' =>  intval($id),
            'status' => 0
        ];

        AddFriend::create($data);
        return back()->with('addfr','Dostluq isteyi yollandi');

    }

    public function deletefriend($id){
        $delete=DB::table('addfriend')->where('to_user',$id)->delete();

        return back()->with('delfr','Dostluq isteyi geri cekildi');

    }


}

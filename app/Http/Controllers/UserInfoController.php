<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Friend;
use Session;


class UserInfoController extends Controller
{
    public function index($id)
    {
         
        $user = User::find($id);
        
        //$check_friend=user()->friendss->where('status',1)->first();
       
        $isFriend = user()->friends->pluck('to_id')->contains($id);
        return view('user_info',compact('user','isFriend'));
    }
    /**
     * Update the specified resource in storage.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function add_friend($to_id)
    {
        $from_id = user()->id;
        
        $check = Friend::FriendRequest($to_id)->CheckFriendRequest($to_id)->first();
                           
        if(!$check){
            user()->friends()->create([
                'to_id' =>  $to_id,
                'status' => 0
            ]);
               
            return back()->with('action_status','Dostluq istəyi yollandı');
        }
        else{
            dd('Mesaj yollanib');
        }                    
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy ($id)
    {   
        
        Friend::FriendRequest($id)->delete();
     
        return back()->with('action_status','Dostluq istəyi geri çəkildi');
    }



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileImageRequest;
use Illuminate\Support\Facades\Storage;
use Session;

class ProfileController extends Controller
{
    public function index(){
      
        return view('profil');
    }
    public function edit(ProfileImageRequest $request){        

            $id=Auth::user()->id;
           
            if ($request->validated()) {
               
                if($request->age){
                    $edit=User::find($id)->update([
                        "age"=>$request->age
                    ]);
                }
                if($request->file('image'))
                {
                    $update=User::find($id);
                    $image_name=$request->file('image')->store('profile', ['disk' => 'public']);
                     $update->image=$image_name;
                     $update->save();
                }
                $request->session()->flash('success', 'Yenilenme islemi ugurla edildi');
                return redirect()->route('home');
            }
            
        
        
    
       
       
    }
}

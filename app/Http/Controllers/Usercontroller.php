<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class Usercontroller extends Controller
{
    //
    function login(Request $req)
    {
        $user= User::where(['email'=>$req->email])->first();
        if($user || Hash::check(md5($req->Password),$user->Password))
        {
            $req->session()->put('user',$user);
             return redirect('/'); 
          
        }    
        else{
              return"username or password is not matched";
        }

       
           
            
        
    
    }
}

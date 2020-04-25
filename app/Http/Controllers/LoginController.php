<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request){

        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ]))
        
        {
            $user=User::where('email',$request->email)->first();

            if($user->is_Student()){
                return redirect()->route('studentdashboard');
            }
            elseif($user->is_Staff()){
                return redirect()->route('staffdashboard');
            }
            // else($user->is_Admin()){
                return redirect()->route('admindashboard');
            // }
        }

        return redirect()->back();
    }
}

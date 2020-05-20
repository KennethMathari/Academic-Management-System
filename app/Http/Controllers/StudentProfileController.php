<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;

use Illuminate\Http\Request;
use App\User;

// use App\StudentProfile;

use DB;


class StudentProfileController extends Controller
{
    public function index(){

        $user=User::all();
        return view('studentdashboard')->with('user',$user);

    }

    public function edit($id)
    {
        $user=User::findOrFail($id);
        return view('admin.editstudentprofile')->with('user',$user);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'Adm_No'=>'string|max:255',
            'class'=>'string|max:255',
            'DoB'=>'required|string|max:255',
            'father_name'=>'required|string|max:255',
            'father_no'=>'required|string|max:255',
            'mother_name'=>'required|string|max:255',
            'mother_no'=>'required|string|max:255',
            'resident'=>'required|string|max:255',
            'gender'=>'required|string|max:255',
            'club'=>'required|string|max:255',
            'hobbies'=>'required|string|max:255'
        ]);


        //update studentprofile
        $user=User::findOrFail($id);
        $user->studentprofile->update([
            'DoB'=>$request->input('DoB'),
            'class'=>$request->input('class'),
            'father_name'=>$request->input('father_name'),
            'father_no'=>$request->input('father_no'),
            'mother_name'=>$request->input('mother_name'),
            'mother_no'=>$request->input('mother_no'),
            'resident'=>$request->input('resident'),
            'gender'=>$request->input('gender'),
            'club'=>$request->input('club'),
            'hobbies'=>$request->input('hobbies')
        ]);

        if(auth()->user()->user_type=='admin'){ 
            return redirect('/admindashboard')->with('success',$user->name."'s student profile editted successfully!");

            }else{
            return redirect('/studentdashboard')->with('success',"Your student profile has been editted successfully!");

            }
    
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class StaffProfileController extends Controller
{
    public function edit($id)
    {
        $user=User::findOrFail($id);
        return view('admin.editstaffprofile')->with('user',$user);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
           
            'subjects'=>'required|string|max:255',
            'class'=>'required|string|max:255',
            'bio'=>'required|string',
            'position'=>'required|string|max:255',
            'phone_number'=>'required|string|max:255',
            'skills'=>'required|string|max:255'
        ]);


        //update staffprofile
        $user=User::findOrFail($id);
        $user->staffprofile->update([
            'subjects'=>$request->input('subjects'),
            'class'=>$request->input('class'),
            'bio'=>$request->input('bio'),
            'position'=>$request->input('position'),
            'phone_number'=>$request->input('phone_number'),
            'skills'=>$request->input('skills')
        ]);

        if(auth()->user()->user_type=='admin'){ 
            return redirect('/admindashboard')->with('success',$user->name."'s staff profile editted successfully!");

            }else{
            return redirect('/staffdashboard')->with('success',"Your staff profile has been editted successfully!");

            }

    }
}

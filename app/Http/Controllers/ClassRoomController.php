<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassRoom;
use App\StaffProfile;
use App\User;
use Auth;
use DB;




class ClassRoomController extends Controller
{
    public function index(){
        $users=ClassRoom::orderBy('created_at','desc')->where('year', '=', now()->year)->where('teacher_id','=',Auth::user()->Adm_No)->where('class_name','=',Auth::user()->staffprofile->class)->paginate(10);
         return view('staffdashboard')->with('users',$users);
    }


    public function create()
    {
        return view('staff.addstudent');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'class_name'=>'required|string|max:255',
            'student_name'=>'required|string|max:255',
            'student_id'=>'required|string|max:255|exists:student_profiles,Adm_No',
            'teacher_name'=>'required|string|max:255',
            'teacher_id'=>'required|string|max:255',
            'year'=>'required|string|max:255'
        ]);

        //checks if student exists.
        if (ClassRoom::where('student_id', '=', $request->input('student_id'))->where('year','=',now()->year)->exists()) {
            return redirect('/classroom/create')->with('error','Student already exists!');

        } else {
        //creates new student class
        $user= new ClassRoom;
        $user->class_name= $request->input('class_name');
        $user->student_name= $request->input('student_name');
        $user->student_id= $request->input('student_id');
        $user->teacher_name= $request->input('teacher_name');
        $user->teacher_id= $request->input('teacher_id');
        $user->year= $request->input('year');    
        $user->save();
        return redirect('/staffdashboard')->with('success','Student added to class successfully!');
        }
    }

    public function search(Request $request){
        $search=$request->get('search');
        $users=DB::table('class_rooms')->where('student_name','like','%'.$search.'%')->where('teacher_id','=',Auth::user()->Adm_No)->paginate(5);
        return view('/staffdashboard',['users'=>$users]);
    }

    public function destroy($id){
        $user=Classroom::find($id)->where('student_id','=',$id)->where('teacher_id','=',Auth::user()->Adm_No)->where('year','=',now()->year);
        $user->delete();
        return redirect('/staffdashboard')->with('success','Student deleted successfully!');
    }

    public function edit($id){
        $user=Classroom::findOrFail($id);
        return view('staff.editstudent')->with('user',$user);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'student_name'=>'required|string|max:255'
        ]);

        //update student name
        $user=ClassRoom::find($id);
        $user->student_name= $request->input('student_name');
        $user->update();

        return redirect('/staffdashboard')->with('success','Student editted successfully!');
    }

    public function show($id)
    {
        $classroom=Classroom::findOrFail($id)->orderBy('created_at','desc')->where('teacher_id','=',Auth::user()->Adm_No)->where('year','=',now()->year)->latest()->first();;
        return view('admin.showuser')->with('user',$classroom);
    }
}

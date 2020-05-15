<?php

namespace App\Http\Controllers;

use App\PerformanceRecord;
use App\ClassRoom;
use Illuminate\Http\Request;
use DB;
use Auth;



class PerformanceRecordController extends Controller
{
    public function index(){
        $records=PerformanceRecord::orderBy('created_at','desc')->where('student_id','=',Auth::user()->Adm_No)->paginate(10);
        return view('studentdashboard')->with('records',$records);
    }

   public function addmarks($id){
    $classroom=ClassRoom::find($id);
    return view('staff.addmarks')->with('classroom',$classroom);
   }

   public function store(Request $request){
    $this->validate($request,[
        'student_id'=>'required|string|max:255',
        'student_name'=>'required|string|max:255',
        'title'=>'required|string|max:255',
        'english'=>'required|numeric|between:0,100',
        'kiswahili'=>'numeric|required|between:0,100',
        'mathematics'=>'required|numeric|between:0,100',
        'science'=>'required|numeric|between:0,100',
        'social_studies'=>'required|numeric|between:0,60',
        'religious_education'=>'required|numeric|between:0,30',
        'class_name'=>'required|string|max:255',
        'teacher_id'=>'required|string|max:255',
        'teacher_name'=>'required|string|max:255',
        'year'=>'required|string|max:255'

    ]);

    //creates new performance record
    $user= new PerformanceRecord;
    $user->student_id= $request->input('student_id');
    $user->student_name= $request->input('student_name');
    $user->title= $request->input('title');
    $user->english= $request->input('english');
    $user->kiswahili= $request->input('kiswahili');
    $user->mathematics= $request->input('mathematics');
    $user->science= $request->input('science');
    $user->social_studies= $request->input('social_studies');
    $user->religious_education= $request->input('religious_education');
    $user->total=$request->input('english')+$request->input('kiswahili')+$request->input('mathematics')+$request->input('science')+$request->input('social_studies')+$request->input('religious_education');
    $user->class_name= $request->input('class_name');
    $user->teacher_id= $request->input('teacher_id');
    $user->teacher_name= $request->input('teacher_name');
    $user->year= $request->input('year');
    $user->save();

    return redirect('/staffdashboard')->with('success',$user->student_name."'s exam record added successfully!");

   }

   public function search(Request $request){
        if (Auth::user()->user_type=='student') {
            $search=$request->get('search');
            $records=DB::table('performance_records')->where('class_name','like','%'.$search.'%')->where('student_id','=',Auth::user()->Adm_No)->paginate(5);
            return view('/studentdashboard',['records'=>$records]);
        } else {
            $search=$request->get('search');        
            $classroom=DB::table('performance_records')->where('class_name','like','%'.$search.'%')->paginate(5);
            return view('admin.showuser',['classroom'=>$classroom]);
        }
    }

    public function show($id){
        $record=PerformanceRecord::findOrFail($id);
        return view('student.showrecord')->with('record',$record);
    }


    public function destroy($id){
        $user=PerformanceRecord::find($id);
        $user->delete();
        return redirect('/staffdashboard')->with('success','Exam record deleted successfully!');
    }

    public function edit($id){
        $record=PerformanceRecord::findOrFail($id);
        return view('staff.editexam')->with('record',$record);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
        'title'=>'required|string|max:255',
        'english'=>'required|numeric|between:0,100',
        'kiswahili'=>'required|numeric|between:0,100',
        'mathematics'=>'required|numeric|between:0,100',
        'science'=>'required|numeric|between:0,100',
        'social_studies'=>'required|numeric|between:0,60',
        'religious_education'=>'required|numeric|between:0,30',
        'teacher_id'=>'required|string|max:255',
        'teacher_name'=>'required|string|max:255'
        ]);

        //update exam record.
        $user=PerformanceRecord::findOrFail($id);
        $user->title= $request->input('title');
        $user->english= $request->input('english');
        $user->kiswahili= $request->input('kiswahili');
        $user->mathematics= $request->input('mathematics');
        $user->science= $request->input('science');
        $user->social_studies= $request->input('social_studies');
        $user->religious_education= $request->input('religious_education');
        $user->total=$request->input('english')+$request->input('kiswahili')+$request->input('mathematics')+$request->input('science')+$request->input('social_studies')+$request->input('religious_education');
        $user->teacher_id= $request->input('teacher_id');
        $user->teacher_name= $request->input('teacher_name');
        $user->update();

        if (Auth::user()->user_type=='staf') {
            return redirect('/staffdashboard')->with('success','Exam record editted successfully!');

        } else {
            return redirect('/admindashboard')->with('success','Exam record editted successfully!');

        }
        

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\Question;
use Auth;
use DB;


class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->user_type=='staff' || Auth::user()->user_type=='admin') {
        $exams=Exam::orderBy('created_at','desc')->where('user_id','=',Auth::user()->Adm_No)->paginate(10);
    } elseif(Auth::user()->user_type=='student') {
        $exams=Exam::orderBy('created_at','desc')->where('class','=',Auth::user()->studentprofile->class)->paginate(10);
    }
    return view('exam.exams')->with('exams',$exams);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exam.addexam');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'title'=>'required|string|max:255',
            'instructions'=>'required|string|max:255',
            'class'=>'required|string|max:255',
            'subject'=>'required|string|max:255',
            'author'=>'required|string|max:255'
        ]);

        $exam=auth()->user()->exams()->create($data);

         return redirect('/exam/'.$exam->id)->with('success', 'Exam has been successfully created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->user_type=='staff' || Auth::user()->user_type=='admin') {
        $exam=Exam::findOrFail($id);
        $exam->setRelation('questions',$exam->questions()->orderBy('created_at','desc')->paginate(10));
        return view('questions.questions')->with('exam',$exam);
    } elseif(Auth::user()->user_type=='student') {
        $exam=Exam::findOrFail($id);
        return view('exam.showexam')->with('exam',$exam);    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam=Exam::findOrFail($id);
        return view('exam.editexam')->with('exam',$exam);
    }

    public function startexam($id){
        $exam=Exam::findOrFail($id);
        $exam->load('questions.options');
        return view('exam.startexam')->with('exam',$exam);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $exam=Exam::find($id);
         //update exam
         $exam->title= $request->input('title');
         $exam->instructions= $request->input('instructions');
         $exam->class= $request->input('class');
         $exam->subject= $request->input('subject');
         $exam->update();

        return redirect('/exam')->with('success','Exam editted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam=Exam::findOrFail($id);
        $exam->delete();
        return redirect('/exam')->with('success','Exam deleted successfully!');
    }

    public function search(Request $request){
        $search=$request->get('search');
        $exams=DB::table('exams')->where('title','like','%'.$search.'%')->where('author_id','=',Auth::user()->Adm_No)->paginate(5);
        return view('exam.exams',['exams'=>$exams]);
    }

    public function storeanswer(Request $request){

        $data=request()->validate([
            'answers.*.option_id'=>'required',
            'answers.*.question_id'=>'required'
        ]);
        
        //  dd(request()->all());
        return $request->input('answers.*.option_id');
        
    }
}

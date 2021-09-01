<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Exam;
use App\Option;
use Auth;
use DB;
use Illuminate\Support\Facades\File; 


class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $exam=Exam::findOrFail($id);
        return view('questions.addquestion')->with('exam',$exam);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'exam_id'=>'required|string|max:255',
            'question'=>'required|string|max:255',
            'score'=>'required|string|max:255',
        ]);

        $question= new Question();

        if($request->hasfile('image')){
            $file=$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('QuestionImage/'),$filename);
            $question->image= $filename;
         }

         $question->exam_id= $request->input('exam_id');
         $question->question=$request->input('question');
         $question->score= $request->input('score');
         $question->save();

         $option1= new Option();
         $option1->question_id= $question->id;
         $option1->option=$request->input('option1');
         if ($request->input('ans1')==1) {
            $option1->is_correct=1;
         } else {
            $option1->is_correct=0;
         }
         $option1->save();

         $option2= new Option();
         $option2->question_id= $question->id;
         $option2->option=$request->input('option2');
         if ($request->input('ans2')==1) {
            $option2->is_correct=1;
         } else {
            $option2->is_correct=0;
         }
         $option2->save();

         $option3= new Option();
         $option3->question_id= $question->id;
         $option3->option=$request->input('option3');

         if ($request->input('ans3')==1) {
            $option3->is_correct=1;
         } else {
            $option3->is_correct=0;
         }
         $option3->save();

         $option4= new Option();
         $option4->question_id= $question->id;
         $option4->option=$request->input('option4');

         if ($request->input('ans4')==1) {
            $option4->is_correct=1;
         } else {
            $option4->is_correct=0;
         }
         $option4->save();

         return redirect('exam/'.$question->exam_id)->with('success', 'Question has been successfully uploaded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question=Question::findOrFail($id);
        return view('questions.showquestion')->with('question',$question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question=Question::findOrFail($id);
        return view('questions.editquestion')->with('question',$question);
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
        $question=Question::find($id);

        if($request->hasfile('image')){
            $file=$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('QuestionImage/'),$filename);
            $question->image= $filename;
         }

        //update question
        $question->question= $request->input('question');
        $question->score= $request->input('score');
        $question->update();

        foreach ($question->options as $option) {
            $option->option= $request->input('option');
            $option->is_correct= $request->input('ans');
            $option->update();
        }

        return redirect('exam/'.$question->exam_id)->with('success','Question editted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question=Question::findOrFail($id);
        if($question->image !='noimage.jpg')
         {
            $destinationPath = '/QuestionImage/';
            File::delete(public_path().$destinationPath.$question->image);
         }
        $question->delete();
        $question->options()->delete();
        return redirect('exam/'.$question->exam_id)->with('success','Question deleted successfully!');
    }

    public function search(Request $request,$id){
        $exam=Exam::findOrFail($id);
        $search=$request->get('search');
        $exam->setRelation('questions', $exam->questions()->where('question','like','%'.$search.'%')->where('exam_id','=',$exam->id)->paginate(10));
        // $exam->questions->where('question','like','%'.$search.'%')->where('exam_id','=',$exam->id)->paginate(5);
        return view('questions.questions')->with('exam',$exam);
    }
}

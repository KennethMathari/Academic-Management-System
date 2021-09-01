<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;
use App\Submission;
use Auth;



class SubmissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $assignment=Assignment::findOrFail($id);
        $submissions=Submission::orderBy('created_at','desc')->where('assignment_id','=',$assignment->id)->paginate(10);
        return view('student.submissions.submissions')->with('submissions',$submissions)->with('assignment',$assignment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $assignment=Assignment::findOrFail($id);
        return view('student.submissions.createsubmission')->with('assignment',$assignment);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'mimes:pdf,zip|max:5000',
        ]);

        //comment in live server(Optional).
        if($request->hasfile('filename')){
            $file=$request->file('filename');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('Submissions/'),$filename);

         }

         //uncomment in live server(Optional)
        //  if ($request->file('filename')->isValid()) {
        //     $path = base_path();
        //     $path = str_replace("AcademicSystem", "public_html", $path); // <= This one !
        //     $destinationPath = $path . '/Submissions'; // upload path
        //     $extension = $request->file('filename')->getClientOriginalExtension(); // getting image extension
        //     $filename = uniqid() . '.' . $extension; // renameing image
        //     $request->file('filename')->move($destinationPath, $filename); // uploading file to given path
        // }

         $form= new Submission();
         $form->assignment_id= $request->input('assignment_id');
         $form->filename=$filename;
         $form->comment= $request->input('comment');
         $form->student_id= $request->input('student_id');
         $form->student_name= $request->input('student_name');
         $form->save();

        return redirect('/assignment')->with('success', 'Your assignment has been successfully submitted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $submission=Submission::findOrFail($id);
        $assignment=Assignment::orderBy('created_at','desc')->where('id','=',$submission->assignment_id)->get();
        return view('student.submissions.showsubmission')->with('submission',$submission)->with('assignment',$assignment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $submission=Submission::findOrFail($id);
        return view('student.submissions.editsubmission')->with('submission',$submission);
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
        $submission=Submission::findOrFail($id);
        if($request->hasfile('filename')){
            $file=$request->file('filename');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('Submissions/'),$filename);
         }
        
        //update submission
        $submission->filename= $filename;
        $submission->comment= $request->input('comment');
        $submission->update();

        return redirect('submission/'.$submission->id)->with('success','Submission editted successfully!');
    }

    public function remarks(Request $request,$id){
        $submission=Submission::findOrFail($id);
        //add remarks
        $submission->teacher_remarks= $request->input('teacher_remarks');
        $submission->update();

        return redirect()->back()->with('success','Teacher remarks added successfully!');
    }

    public function download($file){
        
        return response()->download('Submissions/'.$file);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

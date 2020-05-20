<?php

namespace App\Http\Controllers;

use App\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\FileUpload;
use DB;
use Auth;



class AssignmentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->user_type=='staff') {
            $records=Assignment::orderBy('created_at','desc')->where('teacherid','=',Auth::user()->Adm_No)->paginate(10);
        } elseif(Auth::user()->user_type=='student') {
            $records=Assignment::orderBy('created_at','desc')->where('class','=',Auth::user()->studentprofile->class)->paginate(10);
        }
        
        
        return view('staff/assignment.assignments')->with('records',$records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.assignment.addassignment');
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
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'=>'required|string'
        ]);

        if($request->hasfile('filename'))
         {

            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/Assignments/', $name);  
                $data[] = $name;  
            }
         }

         $form= new Assignment();
         $form->title= $request->input('title');
         $form->filename=json_encode($data);
         $form->description= $request->input('description');
         $form->class= $request->input('class');
         $form->subject= $request->input('subject');
         $form->duedate= $request->input('duedate');
         $form->teacherid= $request->input('teacherid');
         $form->teacher= $request->input('teacher');
        $form->save();

        return redirect('/assignment')->with('success', 'Assignment has been successfully uploaded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assignment=Assignment::findOrFail($id);
        return view('staff.assignment.showassignment')->with('assignment',$assignment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assignment=Assignment::findOrFail($id);
        return view('staff.assignment.editassignment')->with('assignment',$assignment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasfile('filename'))
        {

           foreach($request->file('filename') as $image)
           {
               $name=$image->getClientOriginalName();
               $image->move(public_path().'/Assignments/', $name);  
               $data[] = $name;  
           }
        }

        //update assignment
        $assignment=Assignment::find($id);
        $assignment->title= $request->input('title');
         $assignment->filename=json_encode($data);
         $assignment->description= $request->input('description');
         $assignment->class= $request->input('class');
         $assignment->subject= $request->input('subject');
         $assignment->duedate= $request->input('duedate');
        $assignment->update();

        return redirect('/assignment')->with('success','Assignment editted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assignment=Assignment::findOrFail($id);

        if($assignment->filename !='noimage.jpg')
         {
            foreach(json_decode($assignment->filename)as $picture)
            {
                Storage::delete('/Assignments/'.$picture);
            }
         }

        $assignment->delete();
        return redirect('/assignment')->with('success','Assignment deleted successfully!');

    }

    public function search(Request $request){
        $search=$request->get('search');
        $records=DB::table('assignments')->where('title','like','%'.$search.'%')->where('teacherid','=',Auth::user()->Adm_No)->paginate(5);
        return view('staff.assignment.assignments',['records'=>$records]);
    }
}

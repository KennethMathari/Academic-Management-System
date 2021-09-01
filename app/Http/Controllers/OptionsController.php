<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;


class OptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'question_id'=>'required|string|max:255',
            'option'=>'required|string|max:255',
        ]);

         $option1= new Option();
         $option1->question_id= $request->input('question_id');
         $option1->option=$request->input('option1');
         $option1->is_correct= $request->input('ans1');
         $option1->save();

         $option2= new Option();
         $option2->question_id= $request->input('question_id');
         $option2->option=$request->input('option2');
         $option2->is_correct= $request->input('ans2');
         $option2->save();

         $option3= new Option();
         $option3->question_id= $request->input('question_id');
         $option3->option=$request->input('option3');
         $option3->is_correct= $request->input('ans3');
         $option3->save();

         $option4= new Option();
         $option4->question_id= $request->input('question_id');
         $option4->option=$request->input('option4');
         $option4->is_correct= $request->input('ans4');
         $option4->save();

         return redirect('/exam')->with('success','Question uploaded successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

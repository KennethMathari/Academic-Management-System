<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Auth;


class DynamicPDFController extends Controller
{
   function index(){
       $users=$this->get_studentlist();
       return view('staffdashboard')->with('users',$users);
   }

   function get_studentlist(){
       $users=DB::table('class_rooms')->where('year', '=', now()->year)->where('teacher_id','=',Auth::user()->Adm_No)->where('class_name','=',Auth::user()->staffprofile->class)->get();
       return $users;
   }

   function pdf(){
       $pdf=\App::make('dompdf.wrapper');
       $pdf->loadHTML($this->convert_studentlist_to_html());
       return $pdf->stream();
   }

   function convert_studentlist_to_html(){
       $users=$this->get_studentlist();
       $output='
       <head>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       </head>
       <h3 style="text-align:center">PRECIOUS CORNER STONE ACADEMY PRIMARY SCHOOL</h3>
       <h4 style="text-align:center">Student List</h4>
       <h5 style="text-align:center">Class: '.Auth::user()->staffprofile->class.'</h5>

       <table style="width:100%;text-align:left" class="table table-bordered">
       <tr >
       <th style="text-align:left">ID</th>
       <th style="text-align:left">Name</th>
       <th style="text-align:left">Maths</th>
       <th style="text-align:left">Eng</th>
       <th style="text-align:left">Comp</th>
       <th style="text-align:left">Kisw</th>
       <th style="text-align:left">Insha</th>
       <th style="text-align:left">Science</th>
       <th style="text-align:left">S/ST</th>
       <th style="text-align:left">RE</th>
       <th style="text-align:left">Total</th>



       </tr>
       ';
       foreach ($users as $student) {
           $output.='
            <tr>
            <td>'.$student->student_id.'</td>
            <td>'.$student->student_name.'</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>



            </tr>
           ';
       }
       $output.='</table>
       <p>Class teacher: '.Auth::user()->name.'</p>
       <p>Date: '. now().'</p>
       ';
       return $output;
   }
}

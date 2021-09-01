<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\File; 
use Carbon\Carbon;
use App\User;
use App\StudentProfile;
use App\ClassRoom;
use App\StaffProfile;
use DB;
use Image;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users=User::orderBy('created_at','desc')->paginate(10);
        return view('admin.users')->with('users',$users);
        // return view('admindashboard');

    }

    public function admindashboard()
    {

        // $users=User::orderBy('created_at','desc')->paginate(10);
        // return view('admin.users')->with('users',$users);
        return view('admindashboard');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adduser');
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
            'name'=>'required|string|max:255',
            // 'Adm_No'=>'required|string|max:255|unique:users',
            'user_type'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users|ends_with:@cornerstoneacademy.co.ke',
            'user_image'=>'image|required|max:1999',
            'password'=>'required|string|min:8|confirmed'
        ]);

        // Handle file upload
        if($request->hasfile('user_image')){
            $file=$request->file('user_image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('UserImages/'),$filename);

         }

        //uncomment in live server
        // if ($request->file('user_image')->isValid()) {
        //     $path = base_path();
        //     $path = str_replace("AcademicSystem", "public_html", $path); // <= This one !
        //     $destinationPath = $path . '/UserImages'; // upload path
        //     $extension = $request->file('user_image')->getClientOriginalExtension(); // getting image extension
        //     $fileNameToStore = uniqid() . '.' . $extension; // renaming image
        //     $request->file('user_image')->move($destinationPath, $fileNameToStore); // uploading file to given path
            
        // }

        //Generate custom Adm_No
        $config=['table'=>'users','field'=>'Adm_No','length'=>4,'prefix'=>1,'reset_on_prefix_change'=>true];
        $Adm_No=IdGenerator::generate($config);

        //creates new user
        $user= new User;
        $user->name= $request->input('name');
        $user->Adm_No= $Adm_No;
        $user->user_type= $request->input('user_type');
        $user->email= $request->input('email');
        $user->user_image=$filename;
        $user->password= Hash::make($request->input('password'));
        $user->save();

        if($user->user_type=='student'){
            //checks if user exists in student_profiles table.
            if (DB::table('student_profiles')->where('Adm_No', '!=', $user->Adm_No)->get()) {
                //creates a new Adm_No in student_profiles table for every user created. 
                $studentprofile=new StudentProfile;
                $studentprofile->Adm_No= $Adm_No;
                $studentprofile->save();
            } else {
                
            }
            
        }elseif($user->user_type=='staff'){
        //creates a new Adm_No in staff_profiles table for every user created. 
        $staffprofile=new StaffProfile;
        $staffprofile->Adm_No= $Adm_No;
        $staffprofile->save();

        }

    
        return redirect('/users')->with('success','User created successfully!');
    }

    public function search(Request $request){
        $search=$request->get('search');
        $users=DB::table('users')->where('name','like','%'.$search.'%')->paginate(5);
        return view('admin.users',['users'=>$users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::findOrFail($id);
        $classroom=ClassRoom::find($id);
        return view('admin.showuser')->with('user',$user)->with('classroom',$classroom);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user=User::findOrFail($id);
        return view('admin.edituser')->with('user',$user);
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
        $this->validate($request,[
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255',
            'user_image'=>'image|max:1999'
        ]);

        // Handle file upload
        if($request->hasfile('user_image')){
            $file=$request->file('user_image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('UserImages/'),$filename);

         }

        //update user
        $user=User::findOrFail($id);
        $user->name= $request->input('name');
        $user->email= $request->input('email');
        if($request->hasFile('user_image')){
            $user->user_image=$filename;
        }
        $user->update();


        return redirect('/users')->with('success','User editted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
       
        if($user->user_image !='noimage.jpg'){
            // Delete image
            $destinationPath = '/storage/user_images/';
            File::delete(public_path().$destinationPath.$user->user_image);
        }
        $user->delete();

                if($user->user_type=='student'){

                        $user->studentprofile()->delete();
                    }
                elseif($user->user_type=='staff'){
                        
                        $user->staffprofile()->delete();
                    }

            return redirect('/users')->with('success','User deleted successfully!');
}

}

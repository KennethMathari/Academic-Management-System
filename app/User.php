<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','Adm_No','user_type', 'email','password'
    ];
    protected $primaryKey = "Adm_No";

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function is_Student(){
        if(auth()->user()->user_type == 'student'){
                return true;
        }
        return false;
    }

    public function is_Staff(){
        if(auth()->user()->user_type == 'staff'){
                return true;
        }
        return false;
    }

    public function studentprofile(){
        return $this->hasOne('App\StudentProfile','Adm_No','Adm_No');
    }

    public function staffprofile(){
        return $this->hasOne('App\StaffProfile','Adm_No','Adm_No');
    }

    public function classroom(){
        return $this->hasMany('App\ClassRoom','student_id','Adm_No');
        return $this->hasMany('App\ClassRoom','teacher_id','Adm_No');


    }
}

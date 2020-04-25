<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    protected $guarded=[];
    protected $primaryKey = "id";

    public function user(){
        return $this->belongsTo('App\User','Adm_No','Adm_No');
    }

    public function staffprofile(){
        return $this->belongsTo('App\StaffProfile','Adm_No','class_teacher');
    }

    public function classroom(){
        return $this->hasOne('App\ClassRoom','student','Adm_No');
    }
}

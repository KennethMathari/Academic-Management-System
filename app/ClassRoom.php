<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $guarded=[];
    protected $fillable = [
        'class_name','student_name','student_id', 'teacher_name','teacher_id','year'
    ];

    public $table = 'class_rooms';

    protected $primaryKey = "student_id";





    public function studentprofile(){
        return $this->belongsTo('App\StudentProfile','Adm_No','student_id');
    }

    public function staffprofile(){
        return $this->belongsTo('App\StaffProfile','Adm_No','teacher_id');
    }

    public function user(){
        return $this->belongsTo('App\User','Adm_No','student_id');
    }

    public function performancerecord(){
        return $this->hasMany('App\PerformanceRecord','student_id','student_id');
    }
}

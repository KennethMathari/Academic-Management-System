<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerformanceRecord extends Model
{
    protected $guarded=[];
    protected $fillable = [
        'student_id','student_name','title', 'english','kiswahili','mathematics','science','social_studies','religious_education',
        'total','class_name','teacher_id','teacher_name','year'
    ];

    public $table = 'performance_records';

    protected $primaryKey = 'id';


    public function classroom(){
        return $this->belongsTo('App\ClassRoom','student_id','student_id');
    }
}

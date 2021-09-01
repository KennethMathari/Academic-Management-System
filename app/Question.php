<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['id','exam_id', 'question','image','score'];
    protected $guarded=[];


    public function exam(){
        return $this->belongsTo('App\Exam','id','exam_id');
    }

    public function options(){
        return $this->hasMany('App\Option','question_id');
    }
}

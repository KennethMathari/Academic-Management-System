<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['id','question_id', 'option','is_correct'];
    protected $guarded=[];


    public function question(){
        return $this->belongsTo('App\Question','id','question_id');
    }
}

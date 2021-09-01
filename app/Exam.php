<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['id','title', 'instructions','class','subject','author_id','author'];


    public function questions(){
        return $this->hasMany('App\Question','exam_id');
    }

    // public function options() {
    //     return $this->hasManyThrough(App\Option::class, App\Question::class);
    // }

    public function user(){
        return $this->belongsTo('App\User','id','user_id');
    }
}

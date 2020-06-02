<?php

namespace App;
use jpmurray\LaravelCountdown\Traits\CalculateTimeDiff;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    // use Notifiable, CalculateTimeDiff;
    protected $guarded = [];
    protected $table='assignments';
    protected $dates = ['duedate'];


    public function submissions(){
        return $this->hasMany('App\Submission','assignment_id');
    }
}

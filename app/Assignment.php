<?php

namespace App;
use jpmurray\LaravelCountdown\Traits\CalculateTimeDiff;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $guarded = [];
    protected $table='assignments';
    protected $dates = ['duedate'];
    protected $casts = [
        'duedate' => 'datetime:Y-m-d h:i:s'
     ];


    public function submissions(){
        return $this->hasMany('App\Submission','assignment_id','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $guarded=[];

    public function assignment(){
        return $this->belongsTo('App\Assignment','id','assignment_id');
    }
}

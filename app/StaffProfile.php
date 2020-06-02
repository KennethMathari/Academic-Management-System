<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffProfile extends Model
{
    protected $guarded=[];
    protected $primaryKey = "Adm_No";

    protected $fillable = [
        'Adm_No','subjects', 'class','bio','position','phone_number','skills'
    ];


    public function user(){
        return $this->belongsTo('App\User','Adm_No','Adm_No');
    }

    public function classroom(){
        return $this->hasMany('App\ClassRoom','teacher_id','Adm_No');
    }
}

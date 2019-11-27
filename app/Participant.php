<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{

    protected $fillable = ['last_name','first_name','name_reading','sex','participant_phone','participant_mail'];


    public function events(){
        return $this->belongsToMany('App\Event','event_participants'.'event_id','participant_id');
        
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_participant extends Model
{
    protected $table ='event_participants';
    //
    protected $fillable = ['event_id','participant_id','application_date'];

    public function event(){
        return $this->hasone('App\Event');
    }


    public function participants(){
        return $this->hasone('App\Paticipants');
    }
    

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Event extends Model
{
    //
    protected $table ='events';
    
    //
    protected $fillable = ['user_id','event_name','event_date','event_start_time','capacity','venue','event_details','created_id','update_id','created_at','update_at','deleted_id','deleted_at'];
    
    public function participants(){
        
        return $this->belongsToMany('App\participant','event_participants','event_id','participant_id');
        
    }

    use SoftDeletes;

    

}

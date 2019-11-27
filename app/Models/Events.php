<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = ['last_name', 'first_name', 'name_reading' ,'sex' ,'participant_phone' ,'participant_mail'];
    
}

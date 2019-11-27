<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\user;
use App\Event;
use App\Participant;
use App\Event_participant;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventsController extends Controller
{
    public function index(Request $request){
        $date=new Carbon(carbon::now());
        $items1 = DB::table('events')->whereDate('event_date','>=',$date)->wherenull('deleted_at')->paginate(4);
        return view('event.events',['items1' => $items1]);

    }

    //イベント詳細ページについて
    public function show(Request $request){
        $id = $request->id;
        $item = DB::table('events')->where('id', $id)->first();
        $user_id = $item->user_id;
        $user= DB::table('users')->where('id',$user_id)->first();

        return view('event.event_show',['item'=>$item,'user'=>$user]);
    }

    public function search(Request $request){
        /*$date=new Carbon(carbon::now());
        $items1 = DB::table('events')->whereDate('event_date','>=',$date)->paginate(4);*/
        $city_name = $request->input('city_name');

        if(!empty($city_name))
        {
            $date=new Carbon(carbon::now());
            $items1=DB::table('events')->where('venue','like','%'.$city_name .'%')->whereDate('event_date','>=',$date)->wherenull('deleted_at')->orderBy('event_date', 'asc')->paginate(10);
        }else{
            $date=new Carbon(carbon::now());
            $items1=DB::table('events')->whereDate('event_date','>=',$date)->paginate(4);
        }
        
        /*$hash = array(
            'city_name'=>$city_name,
            'events'=> $events,
        );*/

        
        
        
        return view('event.events',['items1'=>$items1]);
    }

    //参加フォーム
    public function form(Request $request){
        $id = $request->id;
        $item = DB::table('events')->where('id', $id)->first();
        return view('event.event_form',['item'=>$item]);
    }

    public function confirm(Request $request){
        $id = $request->id;
        $item = DB::table('events')->where('id', $id)->first();
        $hash = array(
            'request' => $request,
        );

        return view('event.event_confirm',['item'=>$item])->with($hash);

    }


    public function finish(Request $request){
        $post1 = new Participant;
        $post1 -> last_name = $request -> last_name;
        $post1 -> first_name = $request -> first_name;
        $post1 -> name_reading = $request -> name_reading;
        $post1 -> sex = $request -> sex;
        $post1 -> participant_phone = $request -> participant_phone;
        $post1 -> participant_mail = $request -> participant_mail;

        $post1->save();

        $post2 = new Event_participant;
        $post2 -> event_id = $request -> event_id;
        $post2 -> participant_id = $post1 -> id;
        $post2 -> application_date = $post1 -> created_at;
        
        $post2 -> save();
        return view('event.event_finish');
    }

}

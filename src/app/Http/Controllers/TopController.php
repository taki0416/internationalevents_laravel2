<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class TopController extends Controller
{
    public function index(Request $request){
        $date = new Carbon(carbon::now());
        $items1 = DB::table('events')->whereDate('event_date','>=',$date)->wherenull('deleted_at')->paginate(4);
        $items2 = DB::table('events')->whereDate('event_date','<=',$date)->wherenull('deleted_at')->paginate(4);
        return view('top',['items1' => $items1 ,'items2' => $items2]);
    }

    public function test(){
        $address = "東京都新宿区西新宿２−８−１";

        return view('test',compact('address'));
    }


    public function profile(Request $request){
        $id = $request->id;
        $profile = DB::table('users')->where('id',$id)->first();
        return view('user_profile_public' , ['profile' => $profile]) ;
    }

}

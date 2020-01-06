<?php

namespace App\Http\Controllers;
use Auth;
use App\Event;
use App\Participant;
use App\Event_participant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Response;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;


class User_topController extends Controller
{


    public function index(){
        $id = Auth::id();
        $user = Auth::user();
        $item = DB::table('users')->where('id', $id)->first();
        $events = DB::table('events')->where('user_id', $id)->whereNull('deleted_at')->get();
        
        return view('user_top',['events' => $events],['item'=>$item]);
    }

    public function list(){
        $id = Auth::id();
        $user = Auth::user();
        $item = DB::table('users')->where('id', $id)->first();
        $events = DB::table('events')->where('user_id', $id)->whereNull('deleted_at')->orderby('event_date','asc')->get();
        return view('user.event_list',['events' => $events],['item'=>$item]);
    }

    public function image(Request $request){
        $id=Auth::id();
        $image_name=$id.'.jpg';

        $image=$request->file('image_url'); 
        $image2 = Image::make(file_get_contents($image->getRealPath()));

            print($image->getRealPath());

        $image2 ->resize(300, 300)->save(public_path('/post_images/'.Auth::id() . '.jpg'));

        //$id = Auth::id();
        //$image_url=$id.'.jpg';



        $user=User::find($id);
        $user->image_url=$image_name;
        $user->save();


        //$post->image_url = $request->image_url->storeAs('public\post_images', $time.'_'.Auth::id() . '.jpg');



        return redirect('/user_profile');
    }



    public function profile(){
        $id = Auth::id();
        $user = Auth::user();
        $item = DB::table('users')->where('id', $id)->first();

        $id = Auth::id();
        $image_url=$id.'.jpg';
        
        
        
        return view('user.user_profile',['item'=>$item , 'image_url'=>$image_url]);
    }



    public function profileUpdate(Request $request ){
        $id = Auth::id();
        $user = Auth::user();
        $item = DB::table('users')->where('id', $id)->first();
        
        $post1 = User::find($request->id);
        $form = $request->all();
        $post1->fill($form)->save();
        session()->flash('flash_message', 'プロフィールを編集しました！');
        return redirect()->to('/user_profile');
        
    }










    public function store(ProfileRequest $request){
        $request->photo->storeAs('public/profile_images', Auth::id() . '.jpg');

        return redirect('profile')->with('success', '新しいプロフィールを登録しました');

    }



    public function eventInput(Request $request){

        return view('user.event_input');
    }


    public function eventInputConfirm(Request $request){
        $id = Auth::id();
        $events = new Event();
        $events -> user_id = $id;
        $events -> event_name =  $request -> event_name;
        $events -> event_date =  $request -> event_date;
        $events -> event_start_time = $request -> event_start_time;
        $events -> capacity =  $request -> capacity;
        $events -> venue =  $request -> venue;
        $events -> event_details =  $request -> event_details;
        $events -> save();


        return view('user.event_input_confirm');
    }


    //イベントの詳細ページへ
    public function eventShow(Request $request){
        $id = $request->id;
        $user = Auth::user();
        $events = DB::table('events')->where('id', $id)->first();
        $count = DB::table('event_participants')->where('event_id', $id)->count();

        
        $event_1=Event::find($id);
        $participants = $event_1->participants;


        return view('event.user_event_show',compact('events' ,'count','participants'));
    }

    

    public function export( Request $request ){

        $header=array(
            'Content-type => "text/csv',
            'Content-Disposition'=>'attachment;Filename=csvexport.csv',
            'Pragma'=>'no-cache'
        );

        $columns =[
            "id",
            "last_name",
            "first_name"];
    
        
        mb_convert_variables('SJIS-win','UTF-8', $columns); //文字化け対策

        $id=$request->id;
        $event_1= Event::find($id);
        
        $participants = $event_1->participants;
        
        $csv1="id,last_name,first_name,name_reading,sex,participant_mail,participant_phone"."\n";

        foreach ($participants as $row) {  //データを1行ずつ回す
          $csv = [
              $row->id,
              $row->last_name,
              $row->first_name,
              $row->name_reading,
              $row->sex,
              $row->participant_mail,
              $row->participant_phone
          ];

          $csv1 .= implode(',',$csv)."\n";
          
    
          
          //fputcsv($createCsvFile, $csv); //ファイルに追記する
          mb_convert_variables('SJIS-win', 'UTF-8', $csv1);//文字化け対策 
        }

        //var_dump($csv);
        
        //fclose($createCsvFile); //ファイル閉じる        


           
        return Response::make($csv1, 200, $header);
        
    }
    
    


    public function edit(Request $request){
        $id = $request->id;
        $user = Auth::user();
        $events = DB::table('events')->where('id', $id)->first();
        return view('event.user_event_edit',['events' => $events]);
    }


    public function eventUpdate(Request $request){
       
        $post1 = Event::find($request->id);
        $form = $request->all();
        $post1->fill($form)->save();
        session()->flash('flash_message', 'イベントを編集しました！');
        return redirect()->to('/user_top');
    }

    public function copy(Request $request){
        $id = $request->id;
        $copyEvent=\App\Event::where('id',$id)->first();
        $newName=$copyEvent->event_name;
        
        $newEvent=$copyEvent->replicate();
        $newEvent->event_name = $newName.'_コピー';
        $newEvent->save();
        
        return redirect()->to('/event_list');

    }


    public function delete(Request $request){
        $id = $request->id;
        $deleteEvent=\App\Event::where('id',$id)->first();
        
        $deleteEvent->delete();
        
        return redirect()->to('/user_top');

    }





}

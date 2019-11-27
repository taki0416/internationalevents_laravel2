<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function input(){
        return view('contact.input');
    }

    public function confirm(Request $request){
        
        

        $hash = array(
            'request' => $request,
        );

        return view('contact.confirm')->with($hash);
    }


    public function finish(Request $request){
        
    
        $hash = array(
            'request' => $request,
        );

        return view('contact.finish')->with($hash);
    }

    
}

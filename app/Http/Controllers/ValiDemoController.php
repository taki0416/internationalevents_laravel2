<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValiDemoController extends Controller
{
    public function getInput(){
        return view('contact.input');
    }

    public function confirm(Request $request){
        $validateRules=[
            'username'=>'required',
            'email'=>'required|email|',
            'age'=>'required|numeric',
            'opinion'=>'required|max:2000'
        ];

        $validateMesssage = [
            "required"=>"必須項目です。",
            "email"=>"メールアドレスの形式で入力してください。",
            "numeric"=>"数値で入力してください。",
            "opinion.max"=>"2000文字以内で入力してください。"
        ];

        //バリデーションをインスタンス化
        $this->validate($request, $validateRules, $validateMesssage);

        $date = $requst->all();

        return view('validation.confirm')->with($date);

    }
}

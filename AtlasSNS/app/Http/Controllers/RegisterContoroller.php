<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// バリデーション設定
use App\Http\Requests\UserLogin;

class RegisterContoroller extends Controller{
    // public function test(Request $request){
    //     $rules = [
    //     // バリデーションルール定義
    //     ];
    //     $validator = Validator::make($request, $rule);
    //     if($validator->fails()){
    //     // バリデーションに引っかかった場合の処理
    //     }
    // }
    public function register(SignUp $request){}
}

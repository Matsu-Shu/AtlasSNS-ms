<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    //search
    public function search(Request $request){
        $users = \DB::table('users')->get(); // usersテーブルにある情報を取得し、$usersとする

        $keyword = $request->input('keyword'); //入力されたキーワード（keyword）を$keywordとする

        //もしキーワードに値がある場合は、usersテーブルのusernameを検索し、結果を$userとする
        if(!empty($keyword)) {
            $users=\DB::table('users')
            ->where('username', 'LIKE', "%{$keyword}%")->get();
        }

        return view('users.search',['users'=>$users],compact('users', 'keyword'));
    }
}

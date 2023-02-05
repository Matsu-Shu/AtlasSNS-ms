<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// AtlasSNSフォルダ内にあるAuth処理のphpを使う
use Auth;

class UsersController extends Controller
{
    //ログインユーザー情報の表示
    public function profile()
    {
        $user = Auth::user(); // ログインしているユーザー情報のすべてを取得し、$userとする
        return view('users.profile',['user'=>$user]);
    }

    public function profileUpdate(Request $request){
        $user = Auth::user(); // ログインしているユーザー情報のすべてを取得し、$userとする
        $id = Auth::id(); // ログインしているユーザーのidを取得し、$idとする

        // ユーザー情報の更新
        $user->username = $request->input('username');
        $user->mail = $request->input('mail');
        $user->password = $request->input('password');
        // $user->password = $request->input('password_conf');
        $user->bio = $request->input('bio');

        // 画像のアップロード
        $user->images = $request->file('images')->getClientOriginalName(); //getClientOriginalName()メソッドでファイル名を取得する
        $icon = $request->file('images')->storeAs('images/', $user->images); //store(ファイルの保存先)メソッドで取得した画像を保存する

        \DB::table('users')
            ->where('id', $id)
            ->update([
                'username' => $user->username,
                'mail' => $user->mail,
                'password' => bcrypt($user->password),
                'bio' => $user->bio,
                'images' => $user->images,
            ]);

        return redirect('top');
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
        //compact関数でusersとkeywordの配列化
    }
}

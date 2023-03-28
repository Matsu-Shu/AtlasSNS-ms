<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// バリデーション設定
use App\Http\Requests\UserUpdate;
// AtlasSNSフォルダ内にあるAuth処理のphpを使う
use Auth;
use App\User;
use App\Post;
use App\Follow;

class UsersController extends Controller
{
    //profile
    //ログインユーザー情報の表示
    public function profile()
    {
        $user = Auth::user(); // ログインしているユーザー情報のすべてを取得し、$userとする
        return view('users.profile',['user'=>$user]);
    }

    public function profileUpdate(UserUpdate $request){
        $user = Auth::user(); // ログインしているユーザー情報のすべてを取得し、$userとする
        $id = Auth::id(); // ログインしているユーザーのidを取得し、$idとする

        // ユーザー情報の更新
        $user->username = $request->input('username');
        $user->mail = $request->input('mail');
        $user->password = $request->input('password');
        // $user->password = $request->input('password_conf');
        $user->bio = $request->input('bio');
        // 画像のアップロード
        $user->images = $request->file('images');

        //$user->imagesの値が　!Null；画像含む情報を保存する　Null：画像以外の情報を保存する
        if(!empty($user->images)){
            //getClientOriginalName()メソッドでファイル名を取得する
            $icon=$user->images->getClientOriginalName();
            //storeAs(storage/の中に作るファイル名, 保存するときのファイル名):参照ファイル（public/storage/images）に選択したファイルを保存する処理
            $request->file('images')->storeAs('public/images', $icon);

             \DB::table('users')
            ->where('id', $id)
            ->update([
                'username' => $user->username,
                'mail' => $user->mail,
                'password' => bcrypt($user->password),
                'bio' => $user->bio,
                'images' => $icon,
            ]);

             return redirect('top');
        }else{
            \DB::table('users')
                ->where('id', $id)
                ->update([
                    'username' => $user->username,
                    'mail' => $user->mail,
                    'password' => bcrypt($user->password),
                    'bio' => $user->bio,
                    // 'images' => $user->images,
                ]);

            return redirect('top');
        }
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

    //userProfile
    public function userProfile($id){
        //受け取った$id（ユーザのid）を$user_idとする
        $user_id=$id;

        //ユーザー情報の取得
        $profile=\DB::table('users') ->where('id',$user_id) ->get();

        //投稿情報の取得（1対多：1ユーザー&多投稿）
        $postlist=\DB::table('posts') ->where('user_id',$user_id) ->get();

        //他ユーザープロフページの表示と変数の受け渡し
        return view ('users.userProfile' , compact('profile','postlist'));

    }

    //follow　followテーブルに[following=ログインユーザー][followed=選択したユーザー]を保存する
    public function follow($id)
    {
        // ログインしているユーザーのIDを取得し、$following_idとする
        $following_id = Auth::id();
        //ユーザーのidを取得し、$followed_idとする
        $followed_id = $id;

        // followsテーブルに登録する
        Follow::create([
            'following_id' => $following_id,
            'followed_id' => $followed_id,
        ]);

        return back();

    }

    //unfollow followテーブルからカラムを削除する
    public function unfollow($id)
    {
        \DB::table('follows')
            ->where('followed_id', $id)
            ->delete();

        return back();//プロフィールページリロード
    }


}

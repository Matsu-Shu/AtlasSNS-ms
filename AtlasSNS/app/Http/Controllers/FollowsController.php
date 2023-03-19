<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// AtlasSNSフォルダ内にあるAuth処理のphpを使う
use Auth;
use APP\User;
use APP\Post;
use App\Follow;

class FollowsController extends Controller
{
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

        return redirect('/search'); //検索ページリロード

    }

    //unfollow followテーブルからカラムを削除する
    public function unfollow($id)
    {
        \DB::table('follows')
            ->where('id', $id)
            ->delete();

        return redirect('/search'); //検索ページリロード
    }

    //フォローリスト
    public function followList(){
        //１：アイコン情報を取得する

        //２：投稿を取得する
        // フォローしているユーザーのidを取得（自分がフォローしているユーザーの中でフォロワーが自分であるユーザーを取得）
            //pluckメソッド：引数に指定したカラムの値を配列で返してくれるメソッド
        $following_id = Auth::user()->follows()->pluck('following_id');

        //Postモデル内のフォローしているユーザーのidを元に投稿内容を取得（ポストモデルの中のuser_idが$following_idと一致する投稿を取得する）
        $timelines = Post::with('user')->whereIn('user_id', $following_id)->get();

        return view('/followList', compact('posts'));
    }

    //フォロワーリスト
    public function followerList(){
        return view('follows.followerList');
    }
}

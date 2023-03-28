<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// AtlasSNSフォルダ内にあるAuth処理のphpを使う
use Auth;
use App\User;
use App\Post;
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

        //ユーザーIDをUserモデルのisFollowingメソッドに$idとして渡す
        // isFollowing($followed_id);

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
            ->where('followed_id', $id)
            ->delete();

        return redirect('/search'); //検索ページリロード
    }

    //フォローリスト（自分がフォロー）
    public function followList(){
        // フォローしているユーザーのidを取得（自分がフォローしているユーザーの中でフォロワーが自分であるユーザーを取得）
        //=followsテーブルのfollowed_idを取得する
            //pluckメソッド：引数に指定したカラムの値を配列で返してくれるメソッド
        $following_id = Auth::user()->follows()->pluck('followed_id');

        //１：フォローしているユーザーの情報（アイコンと名前）を取得する
        //Postモデル内のフォローしているユーザーのidを元に投稿内容を取得（ポストモデルの中のuser_idが$following_idと一致する投稿を取得する）し、$timelines（postテーブルの情報）とする
        $followList = User::with('followers')->whereIn('id', $following_id)->get();

        //２：投稿を取得する
        //Postモデル内のフォローしているユーザーのidを元に投稿内容を取得（ポストモデルの中のuser_idが$following_idと一致する投稿を取得する）し、$timelines（postテーブルの情報）とする
        $timelines = Post::with('user')->whereIn('user_id', $following_id)->get();

        return view('follows.followList', compact('timelines','followList'));
    }

    //フォロワーリスト（自分をフォロー）
    public function followerList(){

        // followsテーブル内でfollowed_idが自分のユーザーのユーザーIDを取得する
        //followsテーブルのfollowed_idがログインID（Auth::user()）のfollowing_idを取得する
            //pluckメソッド：引数に指定したカラムの値を配列で返してくれるメソッド
        $followed_id =  \DB::table('follows')->where('followed_id', Auth::id())->pluck('following_id');

        //１：フォローされているユーザーの情報（アイコンと名前）を取得する
        //Postモデル内のフォローしているユーザーのidを元に投稿内容を取得（ポストモデルの中のuser_idが$following_idと一致する投稿を取得する）し、$timelines（postテーブルの情報）とする
        $followerList = User::with('followers')->whereIn('id', $followed_id)->get();

        //２：投稿を取得する
        //Postモデル内のフォローしているユーザーのidを元に投稿内容を取得（ポストモデルの中のuser_idが$following_idと一致する投稿を取得する）し、$timelines（postテーブルの情報）とする
        $timelines = Post::with('user')->whereIn('user_id', $followed_id)->get();

        return view('follows.followerList', compact('timelines','followerList'));
    }

}

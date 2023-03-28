<?php

namespace App\Http\Controllers;
// バリデーション設定
// use App\Http\Requests\Post;
use Illuminate\Http\Request;
// AtlasSNSフォルダ内にあるAuth処理のphpを使う
use Auth;
use App\Post;

class PostsController extends Controller
{
    //投稿表示
    public function index(){
        $user = Auth::user();   // ログインしているユーザー情報のすべてを取得する

        // フォローしているユーザーのidを取得（自分がフォローしているユーザーの中でフォロワーが自分であるユーザーを取得）
        //=followsテーブルのfollowed_idを取得する
        $post_user = Auth::user()->follows()->pluck('followed_id');

        //投稿に紐づくユーザー情報を取得する
        // $postuser = User::with('followers')->whereIn('id', $post_user)->get();

        //Postモデル内のフォローしているユーザーのidを元に投稿内容を取得（ポストモデルの中のuser_idが$following_idと一致する投稿を取得する）し、$timelines（postテーブルの情報）とする = ログインユーザーとフォローしているユーザーの投稿を表示する
        $timelines = Post::with('user')->whereIn('user_id', $post_user)->orWhere('user_id', Auth::user()->id)->latest()->get();

         // indexを表示する
        return view('posts.index',compact('timelines'));
    }

    // 新規投稿
    public function create(Request $request)
    {
        $post = $request->input('newPost'); // 新規投稿(newPost)を取得し、$postとする
        $user_id = Auth::id(); // ログインしているユーザーのIDを取得し、$user_idとする
        // postsテーブルに登録する
        \DB::table('posts')->insert([
            'post' => $post,
            'user_id' => $user_id
        ]);

        return redirect('top');
    }

    // 投稿の更新
    public function update(Request $request)
    {
        $id = $request->input('id'); //投稿のidを取得し、$idとする
        $up_post = $request->input('upPost'); //既存の投稿(post)を取得し、$up_postとする
        \DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );

        return redirect('top');
    }

     // 投稿の削除
    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('top');
    }

}

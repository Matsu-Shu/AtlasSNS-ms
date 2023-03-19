<?php

namespace App\Http\Controllers;
// バリデーション設定
// use App\Http\Requests\Post;
use Illuminate\Http\Request;
// AtlasSNSフォルダ内にあるAuth処理のphpを使う
use Auth;

class PostsController extends Controller
{
    //投稿表示
    public function index(){
        $user = Auth::user();   // ログインしているユーザー情報のすべてを取得する
        $post = \DB::table('posts')->get(); // postテーブルにある情報を取得し、$postとする
         // indexを表示する
        return view('posts.index',['post' => $post]);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PostsController extends Controller
{
    public function index(){
        // indexを表示する
        return view('posts.index');
    }

    // New Post
    public function create(Request $request)
    {
        // 新規投稿を$postにいれる
        $post = $request->input('newPost');
        // $user-_idにログインしているユーザーのIDを取得し、いれる
        $user_id = Auth::id();
        // postsテーブルに登録する
        \DB::table('posts')->insert([
            'post' => $post,
            'user_id' => $user_id
        ]);

        return redirect('index');
    }
}

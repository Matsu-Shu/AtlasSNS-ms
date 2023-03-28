@extends('layouts.login')

@section('content')

<!-- ユーザー情報（アイコン・名前・紹介） -->
@foreach($profile as $users)
<img src="{{ asset('storage/images/'. $users->images) }}"></img>
<p>name</p>
<p>{{ $users -> username}}</p>
<p>bio</p>
<p>{{ $users -> bio }}</p>

<!-- フォロー・解除ボタン -->
<!-- もしログインユーザーがフォローしているユーザーIDがFollowsテーブルのfollowed_idに存在しているなら「フォロー解除」-->
@if(auth()->user()->isFollowing($users->id)->exists())
<a class="" href="unfollow/{{$users->id}}">フォロー解除</a>
@else
<a class="" href="follow/{{$users->id}}">フォローする</a>
@endif

@endforeach

<!-- ユーザーの投稿 -->
@foreach($postlist as $posts)
<!-- UserモデルのuserPostメソッドに$postsにあるuser_idを渡す -> 該当のユーザー情報を取得 -> 名前の表示 -->
<p>{{ userPost($posts->user_id)->get(['username'])}}</p>
<!-- UserモデルのuserPostメソッドに$postsにあるuser_idを渡す -> 該当のユーザー情報を取得 -> アイコンの表示 -->

<!-- 投稿内容 -->
<p>{{ $posts -> post }}</p>
<p>{{ $posts -> created_at }}</p>
@endforeach

@endsection

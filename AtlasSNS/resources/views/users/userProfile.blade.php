@extends('layouts.login')

@section('content')
<div>
<!-- ユーザー情報（アイコン・名前・紹介） -->
  @foreach($profile as $users)
    <div class="profile_form top_contents">
      <img src="{{ asset('storage/images/'. $users->images) }}" class= "profile_icon"></img>
      <div class="profile_list">
        <p class="profile_item">name</p>
        <p class="profile_item">bio</p>
      </div>
      <div class="profile_inside">
        <p class="profile_item">{{ $users -> username}}</p>
        <p class="profile_item">{{ $users -> bio }}</p>
      </div>
        <!-- フォロー・解除ボタン -->
        @if(auth()->user()->isFollowing($users->id)->exists())
        <a class="btn_unfollow profile_btn" href="unfollow/{{$users->id}}">フォロー解除</a>
        @else
        <a class="btn_follow profile_btn" href="follow/{{$users->id}}">フォローする</a>
        @endif
    </div>
  @endforeach
</div>
<div>
<!-- ユーザーの投稿 -->
  @foreach($postlist as $posts)
    <div class="user_post">
      <p class="post_icon"><img src="{{ asset('storage/images/'. $posts-> user->images )}}"></img></p>
      <div class="post_main">
        <p class="post_name">{{ $posts-> user->username }}</p>
        <p class="post_post">{{ $posts -> post }}</p>
      </div>
      <p class="post_time">{{ $posts -> created_at }}</p>
    </div>
  @endforeach
</div>

@endsection

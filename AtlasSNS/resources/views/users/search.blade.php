@extends('layouts.login')

@section('content')
<!-- 検索フォーム -->
<form action="/search" method="geet" class="search_form">
   <!-- 任意の<input>要素＝入力欄などを用意する -->
   <input type="text" name="keyword" class="keyword" placeholder="ユーザー名">
   <!-- 送信ボタンを用意する -->
   <input type="image" class="search_img" src="images/search_my.png">
</form>

<!-- 検索ワード -->
<P>{{( $keyword )}}

<!-- ユーザーリスト -->
<!-- キーワードに値がない場合は、userテーブルから名前とアイコンを取得し表示する、ある場合は、キーワードの結果を表示する、 -->
   @foreach ($users as $users)
   <div>
      <p class="search_icon"><img src="{{ asset('storage/images/'. $users->images) }}"></p>
      <p class="search_name">{{ $users->username }}</p>
      <!-- もしログインユーザーがフォローしているユーザーIDがFollowsテーブルのfollowed_idに存在しているなら「フォロー解除」-->
      @if(auth()->user()->isFollowing($users->id)->exists())
      <p><a class="btn_unfollow chart_btn" href="unfollow/{{$users->id}}">フォロー解除</a></p>
      @else
      <p><a class="btn_follow chart_btn" href="follow/{{$users->id}}">フォローする</a></p>
      @endif
   </div>
   @endforeach

@endsection

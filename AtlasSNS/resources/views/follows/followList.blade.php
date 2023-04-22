@extends('layouts.login')

@section('content')
<div class="list top_contents">
   <!-- フォローリスト（アイコン）：アイコン押下後、そのユーザーのプロフィールページに遷移する-->
   <h3>Follow List</h3>
   <!-- アイコンの表示 -->
   @foreach ($followList as $users)
   <a href="profile/{{$users->id}}"><img src="{{ asset('storage/images/'. $users->images) }}" class="list_icon"></a>
   @endforeach
</div>

<!-- フォローユーザーの投稿一覧 ：「アイコン・名前・投稿・投稿日時」を投稿日時が新しい順で表示-->
<table>
   @foreach ($timelines as $timelines)
   <div class="post user_post">
      <p class="post_icon"><img src="{{ asset('storage/images/'. $timelines-> user -> images) }}"></p>
      <div class="post_main">
         <p class="post_name">{{ $timelines-> user -> username }}</p>
         <p class="post_post">{{ $timelines->post }}</p>
      </div>
      <p class="post_time">{{ $timelines->created_at }}</p>
   </div>
   @endforeach
</table>


@endsection

@extends('layouts.login')

@section('content')
<!-- 検索フォーム -->
<form action="/search" method="geet">
   <!-- 任意の<input>要素＝入力欄などを用意する -->
   <input type="text" name="keyword" placeholder="ユーザー名">
   <!-- 送信ボタンを用意する -->
   <input type="image" class="search_img" src="images/search_my.png">
</form>

<!-- 検索ワード -->
<P>{{( $keyword )}}

<!-- ユーザーリスト -->
<!-- キーワードに値がない場合は、userテーブルから名前とアイコンを取得し表示する、ある場合は、キーワードの結果を表示する、 -->
<table>
   @foreach ($users as $users)
   <tr>
      <td><img src="{{ asset('storage/images/'. $users->images) }}"></td>
      <td>{{ $users->username }}</td>
      <!-- @if() -->
      <td><a class="" href="follow/{{$users->id}}">フォローする</a></td>
      <!-- @else -->
      <td><a class="" href="unfollow/{{$users->id}}">フォロー解除</a></td>
      <!-- @endif -->
   </tr>
   @endforeach
</table>

@endsection

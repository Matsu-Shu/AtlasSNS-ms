@extends('layouts.login')

@section('content')
<!-- search form -->
<form action="/search" method="geet">
   <!-- 任意の<input>要素＝入力欄などを用意する -->
   <input type="text" name="keyword" placeholder="ユーザー名">
   <!-- 送信ボタンを用意する -->
   <input type="image" class="search_img" src="images/search_my.png">
</form>

<!-- search word -->
<P>{{( $keyword )}}

<!-- user list -->
<!-- キーワードに値がない場合は、userテーブルから名前とアイコンを取得し表示する、ある場合は、キーワードの結果を表示する、 -->
<table>
   @foreach ($users as $users)
   <tr>
      <td><img src="{{ asset('storage/images/'. $users->images) }}"></td>
      <td>{{ $users->username }}</td>
      <td><button type="button">フォローする</button></td>
      <td> <button type="button">フォロー解除</button></td>
   </tr>
   @endforeach
</table>

@endsection

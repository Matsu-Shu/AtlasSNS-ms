@extends('layouts.login')

@section('content')
<!-- search form -->
<form action="/search" method="get">
   <!-- 任意の<input>要素＝入力欄などを用意する -->
   <input type="text" name="keyword" placeholder="ユーザー名">
   <!-- 送信ボタンを用意する -->
   <input type="image" class="search_img" src="images/search_my.png">
</form>

<!-- search word -->


<!-- user list -->
<!-- キーワードに値がない場合は、userテーブルから名前とアイコンを取得し表示する、ある場合は、キーワードの結果の表示する、 -->
<table>
   @foreach ($users as $users)
   <tr>
      <td>{{ $users->images }}</td>
      <td>{{ $users->username }}</td>
   </tr>
   @endforeach
</table>

@endsection

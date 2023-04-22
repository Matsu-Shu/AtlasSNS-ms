@extends('layouts.logout')

@section('content')
<div id="clear">
  <div class="greeting_block">
    <p class="added greeting">{{ session('username') }}さん</p>
    <p class="added greeting">ようこそ！AtlasSNSへ</p>
  </div>
  <div class="text_block">
    <p class="added text">ユーザー登録が完了いたしました。</p>
    <p class="added text">早速ログインをしてみましょう！</p>
  </div>
  <p class="start"><a href="/login">ログイン画面へ</a></p>
</div>
@endsection

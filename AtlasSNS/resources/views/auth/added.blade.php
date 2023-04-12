@extends('layouts.logout')

@section('content')
<div id="clear">
  <p class="added greeting">{{ session('username') }}さん</p>
  <p class="added greeting">ようこそ！AtlasSNSへ！</p>
  <p class="added text">ユーザー登録が完了しました。</p>
  <p class="added text">早速ログインをしてみましょう。</p>

  <p class="start btn"><a href="/login">ログイン画面へ</a></p>
</div>
@endsection

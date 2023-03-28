@extends('layouts.login')

@section('content')
<!-- フォローリスト（アイコン）：アイコン押下後、そのユーザーのプロフィールページに遷移する-->
<h3>Follow List</h3>
<!-- アイコンの表示 -->
<h3>左：Listのアイコン（後消）</h3>
@foreach ($followList as $users)
<a href="profile/{{$users->id}}"><img src="{{ asset('storage/images/'. $users->images) }}"></a>
@endforeach

<!-- フォローユーザーの投稿一覧 ：「アイコン・名前・投稿・投稿日時」を投稿日時が新しい順で表示-->
<!-- アイコンと名前の表示 -->
<table>
   @foreach ($followList as $users)
   <tr>
      <img src="{{ asset('storage/images/'. $users->images) }}">
      <td>{{ $users->username }}</td>
   </tr>
   @endforeach
</table>
<!-- 投稿の表示 -->
<table>
   @foreach ($timelines as $timelines)
   <tr>
      <td>{{ $timelines->post }}</td>
      <td>{{ $timelines->created_at }}</td>
   </tr>
   @endforeach
</table>


@endsection

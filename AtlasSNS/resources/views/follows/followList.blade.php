@extends('layouts.login')

@section('content')
<!-- フォローリスト（アイコン）：アイコン押下後、そのユーザーのプロフィールページに遷移する-->
<h3>Follow List</h3>

<!-- フォローユーザーの投稿一覧 ：「アイコン・名前・投稿・投稿日時」を投稿日時が新しい順で表示-->
<table>
   @foreach ($timelines as $timelines)
   <tr>
      <!-- <td><img src="{{ asset('storage/images/'. $users->images) }}"></td> -->
      <!-- <td>{{ $users->username }}</td> -->
      <td>{{ $timelines->post }}</td>
      <td>{{ $timelines->created_at }}</td>
   </tr>
   @endforeach
</table>


@endsection

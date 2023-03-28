@extends('layouts.login')

@section('content')
<!-- 新規投稿 -->
<img src="{{ asset('storage/images/'. Auth::user()->images) }}">
<!-- urlが 'user/profile' となっているところにフォームの値を送る -->
 {!! Form::open(['url' => 'post/create']) !!}
        <!-- エラーメッセージ -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="form-post">
            {!! Form::input('text', 'newPost', null, ['class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) !!}
        </div>
        <input type="image" class="send_img" src="images/post.png">
 {!! Form::close() !!}

<!-- 投稿 -->
<table>
    @foreach ($timelines as $post)
        <tr>
            <!-- 投稿に紐づくユーザーのアイコンと名前を取得する -->
            <td>{{ $post->post }}</td>
            <td>{{ $post->created_at }}</td>
            <td><a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><input type="image" class="edit_img" src="images/edit.png"></a></td>
            <td><a href="post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除します。よろしいでしょうか？')"><input type="image" class="trash_img" src="images/trash.png"></a></td>
        </tr>
    @endforeach
</table>

<!-- 投稿編集モーダル -->
    <div class="modal js-modal">
        <div class="modal__bg"></div>
        <div class="modal__content">
             <form action="post/update" method="POST">
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <input type="image" class="edit_img" src="images/edit.png">
                {{ csrf_field() }}
             </form>
             <a class="js-modal-close"></a>
            <!-- {{ Form::open(['action' => 'PostsController@update', 'method' => 'post']) }}
              <div class="form-group">
                {!! Form::hidden('id', $post->id,['class' => 'modal_id']) !!}
                {!! Form::input('text','upPost', $post->post ,[ 'class' => 'modal_post']) !!}
              </div>
              <a class="js-modal-close" href=""><input type="image" class="edit_img" src="images/edit.png"></a>
            {{ Form::close() }} -->
        </div>
    </div>
@endsection

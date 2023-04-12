@extends('layouts.login')

@section('content')
<!-- 新規投稿 -->
<div class="new_post">
        <img src="{{ asset('storage/images/'. Auth::user()->images) }}" class="login_icon">
<!-- urlが 'user/profile' となっているところにフォームの値を送る -->
 {!! Form::open(['url' => 'post/create','class' => 'new_form']) !!}
        <div class="form-post">
            <textarea name="newPost" class="form-control" placeholder="投稿内容を入力してください"></textarea>
        </div>
        <!-- エラーメッセージ -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="error_msg">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <input type="image" class="send_img" src="images/post.png">
 {!! Form::close() !!}

</div>

<!-- 投稿 -->
    @foreach ($timelines as $post)
        <div class="post">
            <!-- もし投稿がログインユーザーの投稿なら編集・削除ボタンの表示 -->
            @if($post->user_id==Auth::id())
            <p class="post_icon"><img src="{{ asset('storage/images/'. $post-> user ->images )}}"></p>
            <div class="login_post">
            <!-- 投稿に紐づくユーザーのアイコンと名前を取得する = $postオブジェクトからuserリレーションを使って投稿者の情報を取得する-->
                <p class="post_name">{{ $post-> user->username }}</p>
                <!-- 投稿 -->
                <p class="post_post">{{ $post->post }}</p>
                <p class="post_time">{{ $post->created_at }}</p>
                <div class="btn_block">
                    <p class="post_edit"><a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><input type="image" class=" btn_img" src="images/edit.png"></a></p>
                    <p class="post_trash"><a href="post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除します。よろしいでしょうか？')"><input type="image" class="trash_img btn_img" src="images/trash.png" onmouseover="this.src='images/trash-h.png'" onmouseout="this.src='images/trash.png'" ></a></p>
                </div>
            </div>
            @else
            <div class="user_post">
                <p class="post_icon"><img src="{{ asset('storage/images/'. $post-> user ->images )}}">
                <p class="post_name">{{ $post-> user->username }}
                <p class="post_post">{{ $post->post }}</p>
                <p class="post_time">{{ $post->created_at }}</p>
            </div>
            @endif
        </div>
    @endforeach

<!-- 投稿編集モーダル -->
    <div class="modal js-modal">
        <div class="modal__bg"></div>
        <div class="modal__content">
             <form action="post/update" method="POST">
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <input type="image" class="edit_img btn_img" src="images/edit.png">
                {{ csrf_field() }}
             </form>
             <a class="js-modal-close"></a>
        </div>
    </div>
@endsection

@extends('layouts.login')

@section('content')
<!-- new_Post -->
<img src="{{ Auth::user()->images }}">
<!-- urlが 'user/profile' となっているところにフォームの値を送る -->
 {!! Form::open(['url' => 'post/create']) !!}
        <div class="form-post">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容入力してください']) !!}
        </div>
        <input type="image" class="send_img" src="images/post.png">
 {!! Form::close() !!}

<!-- Post -->
<table>
    @foreach ($post as $post)
        <tr>
            <td>{{ $post->post }}</td>
            <td>{{ $post->created_at }}</td>
            <td><a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><input type="image" class="edit_img" src="images/edit.png"></a></td>
            <td><a href="post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除します。よろしいでしょうか？')"><input type="image" class="trash_img" src="images/trash.png"></a></td>
        </tr>
    @endforeach
</table>
<!-- modal content -->
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

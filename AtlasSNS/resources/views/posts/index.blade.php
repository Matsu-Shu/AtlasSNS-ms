@extends('layouts.login')

@section('content')
<!-- new_Post -->
<img src="images/icon1.png">
<!-- urlが 'user/profile' となっているところにフォームの値を送る -->
 {!! Form::open(['url' => 'post/create']) !!}
        <div class="form-post">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容入力してください']) !!}
        </div>
        <input type="image" class="send_img" src="images/post.png"></button>
 {!! Form::close() !!}

<!-- Post -->

@endsection

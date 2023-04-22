@extends('layouts.logout')

@section('content')

<!-- ログイン -->
{!! Form::open(['url' => '/register' ,'class' => 'register']) !!}


<div class="register_item">
<p class="sub_title font">新規ユーザー登録</p>

{{ Form::label('user name') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('mail adress') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('password') }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('password comfilm') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}

{{ Form::submit('REGSTER',['class' => 'btn']) }}

<p class="login_back font"><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}
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

@endsection

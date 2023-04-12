@extends('layouts.logout')

@section('content')
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
<!-- urlが ‘post/create’ となっているところにフォームの値を送る -->
<div>
{!! Form::open(['class' => 'login']) !!}
    <p class="welcome font">AtlasSNSへようこそ</p>

    <div class="login_item">
      {{ Form::label('mail adress') }}
      {{ Form::text('mail',null,['class' => 'input']) }}
      {{ Form::label('password') }}
      {{ Form::password('password',['class' => 'input']) }}

      {{ Form::submit('LOGIN',['class' => 'btn']) }}
    </div>

    <p class="new_user font"><a href="/register">新規ユーザーの方はこちら</a></p>

    {!! Form::close() !!}
  </div>

@endsection

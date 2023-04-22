@extends('layouts.logout')

@section('content')
<div>
<!-- urlが ‘post/create’ となっているところにフォームの値を送る -->
{!! Form::open(['class' => 'login']) !!}
    <p class="sub_title font">AtlasSNSへようこそ</p>

    <div class="login_item">
      {{ Form::label('mail adress') }}
      {{ Form::text('mail',null,['class' => 'input']) }}
      {{ Form::label('password') }}
      {{ Form::password('password',['class' => 'input']) }}

      {{ Form::submit('LOGIN',['class' => 'btn']) }}
    </div>

    <p class="new_user font"><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

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
</div>

@endsection

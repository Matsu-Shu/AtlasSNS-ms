@extends('layouts.login')

@section('content')
<!-- login information -->
        <form action="profile/update" method="POST" enctype="multipart/form-data" class="edit_form">
            <!-- icon -->
            <img src="{{ asset('storage/images/'. $user->images) }}" class="edit_icon">
            <!-- username -->
            <div class="">
              <label class="edit_item">username</label>
                <div class="edit_input">
                    <p>
                        <input type="text" name="username" class="input_edit" value="{{ $user->username }}">
                    </p>
                </div>
            </div>
            <!-- mail adress -->
            <div class="">
              <label class="edit_item">mail adress</label>
                <div class="edit_input">
                    <p>
                        <input type="text" name="mail" class="input_edit" value="{{ $user->mail }}">
                    </p>
                </div>
            </div>
            <!-- password -->
            <div class="">
              <label class="edit_item">password</label>
                <div class="edit_input">
                    <p>
                        <input type="password" name="password" class="input_edit" value="" >
                    </p>
                </div>
            </div>
            <!-- password comfirm -->
            <div class="">
              <label class="edit_item">password comfirm</label>
                <div class="edit_input">
                    <p>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="input_edit" value="" >
                    </p>
                </div>
            </div>
            <!-- bio -->
            <div class="">
              <label class="edit_item">bio</label>
                <div class="edit_input">
                    <p>
                        <input type="text" name="bio" class="input_edit" value="{{ $user->bio}}" >
                    </p>
                </div>
            </div>
            <!-- icon -->
            <div class="">
              <label class="edit_item">icon image</label>
                <div class="add_icon">
                    <label class="add_file">ファイルを選択
                        <input type="file" name="images" class="" value="" >
                    </label>
                </div>
            </div>
            <input class="edit_btn" type="submit" value="更新">
            {{ csrf_field() }}
        </form>
        <!-- error message -->
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

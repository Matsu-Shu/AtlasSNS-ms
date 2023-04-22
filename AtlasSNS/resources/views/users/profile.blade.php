@extends('layouts.login')

@section('content')
<!-- login information -->
        <form action="profile/update" method="POST" enctype="multipart/form-data" class="edit_form">
            <div class="edit_area">
                <!-- icon -->
                <img src="{{ asset('storage/images/'. $user->images) }}" class="">
                <!-- edit list -->
                <div class="edit_list">
                    <p class="edit_item">username</p>
                    <p class="edit_item">mail adress</p>
                    <p class="edit_item">password</p>
                    <p class="edit_item">password comfirm</p>
                    <p class="edit_item">bio</p>
                    <p class="edit_item">icon image</p>
                </div>
                <div class="edit_part">
                    <div class="edit_input">
                        <input type="text" name="username" class="input_edit" value="{{ $user->username }}">
                    </div>
                    <div class="edit_input">
                        <input type="text" name="mail" class="input_edit" value="{{ $user->mail }}">
                    </div>
                    <div class="edit_input">
                        <input type="password" name="password" class="input_edit" value="" >
                    </div>
                    <div class="edit_input">
                        <input id="password_confirmation" type="password" name="password_confirmation" class="input_edit" value="" >
                    </div>
                    <div class="edit_input">
                        <input type="text" name="bio" class="input_edit" value="{{ $user->bio}}" >
                    </div>
                    <div class="add_icon">
                        <p class="add_file">ファイルを選択
                            <input type="file" name="images" class="" value="" >
                        </p>
                    </div>
                </div>
            </div>
            <div class="edit_btn "><input class=" btn_unfollow update_btn " type="submit" value="更新"></div>
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

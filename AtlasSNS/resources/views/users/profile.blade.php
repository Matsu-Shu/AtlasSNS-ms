@extends('layouts.login')

@section('content')
<!-- login information -->
        <form action="profile/update" method="POST" enctype="multipart/form-data">
            <!-- username -->
            <div class="">
              <label class="">username</label>
                <div class="">
                    <p>
                        <input type="text" name="username" class="" value="{{ $user->username }}" required/>
                    </p>
                </div>
            </div>
            <!-- mail adress -->
            <div class="">
              <label class="">mail adress</label>
                <div class="">
                    <p>
                        <input type="text" name="mail" class="" value="{{ $user->mail }}" required/>
                    </p>
                </div>
            </div>
            <!-- password -->
            <div class="">
              <label class="">password</label>
                <div class="">
                    <p>
                        <input type="password" name="password" class="" value="" required/>
                    </p>
                </div>
            </div>
            <!-- password comfirm -->
            <!-- <div class="">
              <label class="">password comfirm</label>
                <div class="">
                    <p>
                        <input type="password" name="password_conf" class="" value="" required/>
                    </p>
                </div>
            </div> -->
            <!-- bio -->
            <div class="">
              <label class="">bio</label>
                <div class="">
                    <p>
                        <input type="text" name="bio" class="" value="{{ $user->bio}}" required/>
                    </p>
                </div>
            </div>
            <!-- icon -->
            <div class="">
              <label class="">icon image</label>
                <div class="">
                    <p>
                        <input type="file" name="images" class="" required/>
                    </p>
                </div>
            </div>
            <input type="submit" value="更新">
            {{ csrf_field() }}
        </form>


@endsection

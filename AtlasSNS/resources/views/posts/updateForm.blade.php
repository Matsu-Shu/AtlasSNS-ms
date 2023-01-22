@section('content')
<!DOCTYPE html>
<html>
<!-- update -->
<div class="container">
     <h2 class='page-header'>投稿内容を変更する</h2>
    {!! Form::open(['url' => '/post/update']) !!}
        <div class="form-group">
            {!! Form::hidden('id', $post->id) !!}
            {!! Form::input('text', 'upPost', $post->post, ['required', 'class' => 'form-control']) !!}
        </div>
        <input type="image" class="edit_img" src="images/edit.png">
    {!! Form::close() !!}
</div>

</html>
@endsection

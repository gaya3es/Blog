@extends('layouts.app')

@section('content')
<h1>Edit Post</h1>
{!! Form::open(['action' => ['PostsController@update',$post->id],'method'=>'post','enctype'=>'multipart/form-data','files' => true]) !!}
    
<div class="form-group">
<?php
echo Form::label('title', 'Edit your Title', ['class' => 'awesome']); 
echo Form::text('ettl',$post->title, ['class'=>'form-control','placeholder'=>'title']);
?>

</div>
<div class="form-group">
    <?php
    echo Form::label('body', 'Edit Blog Content', ['class' => 'awesome']); 
    echo Form::textarea('ebdy',$post->body, ['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'body of your blog']);
    ?>
    <img src="/storage/cover_images/{{$post->cover_image}}">
    <?php
    echo Form::label('cover_image', 'Click choose file to change image', ['class' => 'awesome']); 
    echo Form::file('cover_image',["class"=>"form-control"]);
    ?>
    
</div>
<div class="form-group">
    <?php
        echo Form::hidden('_method','PUT');

echo Form::submit('Update post',['class'=>'btn btn-success']);
    ?>


</div>

{!! Form::close() !!}
@endsection
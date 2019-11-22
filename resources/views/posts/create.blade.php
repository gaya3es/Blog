@extends('layouts.app')

@section('content')
<div class="container">
<h1>Create Post</h1>
{!! Form::open(['action' => 'PostsController@store','method'=>'post','enctype'=>'multipart/form-data','files' => true]) !!}
    
<div class="form-group">
<?php
echo Form::label('title', 'Enter your Title', ['class' => 'awesome']); 
echo Form::text('ttl','', ['class'=>'form-control','placeholder'=>'title']);
?>

</div>
<br>
<div class="form-group">
    <?php
    echo Form::label('body', 'Enter Blog Content', ['class' => 'awesome']); 
    echo Form::textarea('bdy','', ['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'body of your blog']);
    ?>
    
</div>
<div class="form-group">
        <?php
        echo Form::label('cover_image', 'Add Blog Image', ['class' => 'awesome'], ['files'=>true]); 
        echo Form::file('cover_image',["class"=>"form-control"]);
        ?>
        
    </div>
<div class="form-group">
    <?php

echo Form::submit('Add post',['class'=>'btn btn-success']);
    ?>


</div>

{!! Form::close() !!}
</div>
@endsection
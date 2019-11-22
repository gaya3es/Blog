@extends('layouts.app')

@section('content')
<h1>Post details</h1>
    
<ul class="list-group">
        <p class="lead">
    <a style="float: right;" class="btn btn-outline-primary btn-lg" href="/dashboard" role="button">Back</a>
         </p>
    <li class="list-group-item"><h3>{{$post->title}}</h3>
        <small>written on {{$post->created_at}} by {{$post->user['name']}}</small>
    <div>{!!$post->body!!}
      <img src="{{$path}}/{{$post->cover_image}}">
    </div>
    <div style="float: right; ">
    {!! Form::open(['action' => ['PostsController@destroy',$post->id],'method'=>'post']) !!}
    <a href="/posts/{{ $post->id}}/edit">Edit</a>

      <?php
      echo Form::hidden('_method','DELETE');

echo Form::submit('DELETE',['class'=>'btn btn-danger']);
  ?>
  </div>
    </li>
    </ul>
      
      

@endsection
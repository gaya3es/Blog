@extends('layouts.app')

@section('content')
<h1>All Posts</h1>
@if (count($posts)>0)
    
<ul class="list-group">

    @foreach ($posts as $pos)
<li class="list-group-item"><h3>{{$pos->title}}</h3>
<small>written on {{$pos->created_at}} by {{$pos->user['name']}}</small>
@if (!Auth::guest())
@if (Auth::user()->id==$pos->user_id)
<ul class="list-group">
    <li class="list-group-item" style="border: none">
{!! Form::open(['action' => ['PostsController@destroy',$pos->id],'method'=>'post']) !!}
    <td><a href="posts/{{$pos->id}}/edit" class='btn btn-warning'>Edit</a></td>
    <td>
        {!! Form::hidden('_method', 'DELETE') !!}
        {!! Form::submit('DELETE', ['class'=>'btn btn-danger']) !!}              
    </td>
</li>
</ul>
@endif
@endif
    </li>
    @endforeach
    {{-- for pagination --}}
    {{$posts->links()}}      

</ul>
@else
<p>No Posts Found</p>
@endif
@endsection
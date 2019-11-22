@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <body>
                        <div  class="jumbotron" class="container">
                            <a href="/posts/create" class="btn btn-success" style="float: right;">Create new Post</a>
                            <p></p>
                            <h3>Your Posts............</h3>
                        </div>
                        <div class="card-header"> {{ session('status')}}</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                     {{ session('status') }}
                                </div>
                            @endif

                        <div class="panel-body">

                         @if (count($posts)>0)
                            <table class="table">
                            <tr>
                            <th>Title<th>
                            <th>Edit</th>
                            <th>Delete</th>
                            
                        </tr>
                        @foreach ($posts as $post)
                        <tr>
                            <td><a href="posts/{{$post->id}}/">{{$post->title}}</a></td>
                            <td></td>
                        <td><a href="posts/{{$post->id}}/edit" class='btn btn-warning'>Edit</a></td>
                       <td>

                            {!! Form::open(['action' => ['PostsController@destroy',$post->id],'method'=>'post']) !!}
                            {!! Form::hidden('_method', 'DELETE') !!}
                            {!! Form::submit('DELETE', ['class'=>'btn btn-danger']) !!}
                                   
                        </td>
                        </tr>
                            
                        @endforeach

                    </table>
                        
                    @else
                        <h4>No Posts Found</h4>
                    @endif

                 </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

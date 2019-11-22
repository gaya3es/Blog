@extends('layouts.app')

@section('content')


    <h1>Welcome to my blog</h1>
<p><b>{{$tytl}}</b></p>
@if (count($services)>0)
    
<ul class="list-group">

    @foreach ($services as $ser)
    <li class="list-group-item"><b>{{$ser}}</b></li>
    @endforeach

</ul>
@endif
@endsection
@extends('layouts.app')

@section('content')
    <h1>{{$post->title}}</h1>
    
    <div class="well">
    <br />
    <img src="/images/{{$post->cover_image}}" style="width: 100%;">

    <br><br>
       <h3> {!! $post->body !!}</h3>

       
        <hr />
        <small>{{$post->created_at}}</small>
    </div>
    @if (!Auth::guest())
        @if (Auth::user()->id == $post->user_id)
            <a href="{{$post->id}}/edit" class="btn btn-success">Edit</a>
            {!! Form::open(['action'=>['PostController@destroy',$post->id],'method' => 'POST','class' => 'float-right'])!!}
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                {{Form::hidden('_method','DELETE')}}
            {!! Form::close() !!}
        @endif
        
    @endif
    
@endsection
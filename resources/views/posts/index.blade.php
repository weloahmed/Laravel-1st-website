@extends('layouts.app')

@section('content')
<h1>Blog</h1><br />
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="alert alert-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img src="/images/{{$post->cover_image}}" style="width: 100%;">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="post/{{$post->id}}">{{$post->title}}</a></h3>
                        <hr />
                        <h4>{!! $post->body !!}</h4>
                        <small>{{$post->created_at}} - By | {{$post->user->name}}</small>
                    </div>
                </div>
                
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <h1>There is no posts.</h1>
    @endif
    

    
@endsection
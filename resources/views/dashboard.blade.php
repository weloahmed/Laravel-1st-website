@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/post/create" class="btn btn-primary">Add Post</a>
                    <hr/>
                    <h3>Your Posts</h3>
                        <br />
                    @if (count($posts) > 0)
                        <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($posts as $post)
                            <tr>
                                <th>{{$post->title}}</th>
                            
                                <th><a href="/post/{{$post->id}}/edit" class="btn btn-success">Edit</a></th>
                                <th>
                                {!! Form::open(['action'=>['PostController@destroy',$post->id],'method' => 'POST','class' => 'float-right'])!!}
                                    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                    {{Form::hidden('_method','DELETE')}}
                                {!! Form::close() !!}
                                </th>
                            </tr>
                        @endforeach
                    </table>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

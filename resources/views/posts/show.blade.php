@extends('layouts.app')

@section('content')
    <div class="well">
        <h1>{{$post->title}}</h1>
        <img src = "/storage/cover_images/{{$post->cover_image}}" height="400">
        <p>{!!$post->body!!}</p>
        <hr>
        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
        <hr>
        @if(!Auth::guest()) 
            @if(Auth::user()->id == $post->user_id)      
                <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!! Form::close() !!}
            @endif
        @endif
        <hr>
        
        @if(count($comments))
        <div class="list-group">
            @foreach($comments as $comment) 
            <div class="list-group-item list-group-item-action flex-column align-items-start" style="width:50rem">
                <div class="d-flex w-100 justify-content-between">
                    <strong>{{$comment->created_at->diffForHumans()}} by {{$comment->user->name}}: </strong>
                </div>
                <p class="mb-1" >{{$comment->body}}</p>
            </div>
        @endforeach


        </div>
        @endif
        <hr>

        <div class="card">
            <div class="card-body" style="width:50rem">
            <form action="/posts/{{$post->id}}/comments" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <p class="card-text">
                        <textarea name="body" rows="3" placeholder="You comment here" class="form-control"></textarea>
                    </p>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add comment</button>
                </div>
            </form>
        </div>
        </div>

    </div>    
@endsection
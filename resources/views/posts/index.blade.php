@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
        <div class="well">
            <div class="row">
                <div class="col-md-4">
                    <a href="/posts/{{$post->id}}">
                        <img src = "/storage/cover_images/{{$post->cover_image}}" height="100">
                    </a>
                </div>                
                <div class="col-md-8">
                    <a href="/posts/{{$post->id}}">
                        <h3>{{$post->title}}</h3>
                    </a>
                    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                </div>    
            </div>
        </div>
        @endforeach
        {{$posts->links()}}
    @else
    <p>No posts found</p>
    @endif
@endsection
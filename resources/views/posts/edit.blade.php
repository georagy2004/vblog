@extends('layouts.app')

@section('content')
    <div class="well">
        <h1>Edit Post</h1>
    </div> 
    <div class="well">
        {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', $post->body, ['id'=>'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'body'])}}
        </div>
        <div class="form-group">
                {{Form::file('cover_image')}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        <button type="submit" class="btn btn-primary">Submit</button>

        {!! Form::close() !!}
    </div>
@endsection
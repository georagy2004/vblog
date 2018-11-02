@extends('layouts.app')

@section('content')
    <div class="well">
        <h1>Create Post</h1>
    </div> 
    <div class="well">
        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['id'=>'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'body'])}}
        </div>
        <div class="form-group">
                {{Form::file('cover_image')}}
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        {!! Form::close() !!}
    </div>     
@endsection

{{--  <form action="/posts" method="POST">
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="">
    </div>
    <div class="form-group">
        <label for="body">Example textarea</label>
        <textarea class="form-control" id="body" rows="30" name="body" value=""></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>  --}}
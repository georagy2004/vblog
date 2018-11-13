@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">                
                <div class="panel-heading">Dashboard</div>
                @if(auth()->user()->verified)                   
                    <div class="panel-body">                    
                        <a href="/posts/create" class="btn btn-primary">Creat Post</a>
                        @if(count($posts) > 0) 
                        <h3>Your Blog Posts</h3>
                        <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>                                                        
                                </tr>                  
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post->title}}</td>
                                            <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit<a></td>
                                            <td>        
                                                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        @else
                            <h3>You have no posts</h3>
                        @endif
                    </div>
                @else
                    <div class="panel-body">您的账户需要激活，一封激活邮件已经发出，请前往邮箱激活 <a href={{route('sendMail')}}> 没有收到？</a></div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

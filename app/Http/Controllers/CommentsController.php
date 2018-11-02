<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function show(Post $post){
        dd($post);
    }
    public function store(Post $post){
        Comment::create([
            'body' => request('body'),
            'post_id'  => $post->id,
            'user_id' => auth()->user()->id
        ]);
        
        return back()->with('success', 'Add comment succeeded');
    }
    
}
